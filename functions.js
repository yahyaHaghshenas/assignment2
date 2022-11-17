
$(function() {    
    $(document).ready(function() {
        validateControls();
        $('#submitButton').addClass('disabled');
    });
});

function toggleAddNewTut() {
    var addNewTut = $('#addNewTut');
    var addNewRes = $('#addNewRes');

    if (addNewTut && addNewRes) {
        addNewRes.collapse('hide');
        if (addNewTut.hasClass("show")) {
            addNewTut.collapse('hide');
        } else {
            addNewTut.collapse('show');
        }
    }
}

function toggleAddNewRes() {
    var addNewTut = $('#addNewTut');
    var addNewRes = $('#addNewRes');

    if (addNewTut && addNewRes) {
        addNewTut.collapse('hide');
        if (addNewRes.hasClass("show")) {
            addNewRes.collapse('hide');
        } else {
            addNewRes.collapse('show');
        }
    }
}


function validateControls() {
    var controls = $("#subReq .form-control, #registerSchool .form-control");
    if (controls && controls.length > 0) {
        controls.each(index => {
            var c = $(controls[index]);
            c.on("change paste keyup", function() {    
                c = $(this);
                if (c.val() && c.val().trim().length > 0) {
                    // validate Type 
                    // tutorial is not alowed
                    if(c.attr("id") === "type") {
                        if(c.val().toLowerCase() === "tutorial"){
                            c.addClass("is-invalid");
                            c.removeClass("is-valid");
                            c.val(""); 
                        } else {
                            c.addClass("is-valid");
                            c.removeClass("is-invalid"); 
                        }
                    } else if(c.attr("id") === "proposedDate") {
                        // proposed date must not be before today
                        var pd = new Date(c.val());
                        var now = new Date();
                        var p = new Date(pd.toLocaleDateString("en-US"));
                        var n = new Date(now.toLocaleDateString("en-US"));
                        if(p < n){
                            c.addClass("is-invalid");
                            c.removeClass("is-valid");
                            c.val(""); 
                        } else {
                            c.addClass("is-valid");
                            c.removeClass("is-invalid"); 
                        }
                    } else if (c.attr('type') === 'email') {
                        if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(c.val())) {
                            c.addClass("is-valid");
                            c.removeClass("is-invalid"); 
                        } else {
                            c.addClass("is-invalid");
                            c.removeClass("is-valid");
                        }
                    } else if (['adminPassword', 'confirmAdminPassword'].indexOf(c.attr('id')) === -1) {
                        // valid value is provided
                        c.addClass("is-valid");
                        c.removeClass("is-invalid"); 
                    } 
                    toggleSubmitButton();
                } else {
                    // value is required
                    // must not be empty
                    c.addClass("is-invalid");
                    c.removeClass("is-valid");
                }
             });
        });
    }
}

function generateCard(a) {
    // console.log(">>> ", a);
    var t = a["type"] == "tutorial" ? "warning" : "primary";
    return '<div class="col-sm-4 mt-3 data" data=' + JSON.stringify(a) + '>' +
        '<div class="card">' +
        '<div class="card-body">' +
        '<h5 class="card-title">Request ('+a['id']+')</h5>' +
        "<div class='key-value'><div class='fw-bold'>Type</div><div class='fw-bold text-" + t + "'>" + a["type"] + "</div></div>" +
        "<div class='key-value'><div>Status</div><div class='fw-bold text-danger'>" + a["status"] + "</div></div>" +
        "<div class='key-value'><div>Subject ID</div><div>" + a["subjectID"] + "</div></div>" +
        "<div class='key-value'><div>Subject Name</div><div>" + a["subjectName"] + "</div></div>" +
        "<div class='key-value'><div>Request Date</div><div>" + a["requestDate"] + "</div></div>" +
        "<div class='key-value'><div>Proposed Date</div><div>" + a["proposedDate"] + "</div></div>" +
        "<div class='key-value'><div>Quantity</div><div>" + a["quantity"] + "</div></div>" +
        "<div class='key-value'><div>Description</div><div>" + a["description"] + "</div></div>" +
        '</div>' +
        '</div>' +
        '</div>';
}

function sortBy(key) {
    var parent = $("#cards");
    var items = $(".data");

    if (items && items.length > 0) {
        var original = [];
        var sorted = [];
        parent.html('');
        items.each(index => {
            var c = $(items[index]);
            var data = c.attr('data');
            if (data) {
                original.push(JSON.parse(data));
            }
        });

        console.log('::original', original);
        
        if (key === 'Oldest') {
            sorted = original.sort((a,b)=>{
                var ad = new Date(a.requestDate);
                var bd = new Date(b.requestDate);
                return ad < bd;
            });
        } else if (key === 'Latest') {
            sorted = original.sort((a,b)=>{
                var ad = new Date(a.requestDate);
                var bd = new Date(b.requestDate);
                return  ad > bd;
            });
        } else if (key === 'Type') {
            sorted = original.sort((a,b)=>{
                return a && b ? a.type.toUpperCase().localeCompare(b.type.toUpperCase()) : true;
            });
        }

        if (sorted.length > 0) {
            var k = sorted.map(a => generateCard(a));
            parent.html(k);
        }
    }
    
}

function toggleSubmitButton() {
    var adminEmail = $('#adminEmail').hasClass('is-valid');
    var adminPassword = $('#adminPassword').hasClass('is-valid');
    var confirmAdminPassword = $('#confirmAdminPassword').hasClass('is-valid');
    if (adminEmail && adminPassword && confirmAdminPassword) {
        $('#submitButton').removeClass('disabled');
    } else {
        $('#submitButton').removeClass('disabled');
        $('#submitButton').addClass('disabled');
    }
}

// password confirmation
$('#adminUpdateForm #adminPassword, #adminUpdateForm #confirmAdminPassword').on('keyup', function () {
    if ($('#adminPassword').val() === $('#confirmAdminPassword').val()) {
        $('#adminPassword').addClass("is-valid");
        $('#confirmAdminPassword').addClass("is-valid");
        $('#confirmAdminPassword').removeClass("is-invalid");
    } else {
        $('#confirmAdminPassword').addClass("is-invalid");
        $('#confirmAdminPassword').removeClass("is-valid");
    }
  });

  $('#registerSchool #adminPassword, #registerSchool #confirmAdminPassword').on('keyup', function () {
    if ($('#adminPassword').val() === $('#confirmAdminPassword').val()) {
        $('#adminPassword').addClass("is-valid");
        $('#confirmAdminPassword').addClass("is-valid");
        $('#confirmAdminPassword').removeClass("is-invalid");
    } else {
        $('#confirmAdminPassword').addClass("is-invalid");
        $('#confirmAdminPassword').removeClass("is-valid");
    }
  });
