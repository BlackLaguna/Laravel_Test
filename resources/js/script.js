$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

$('.save_employee').on('click',function () {
   let id = this.dataset.id;
   let name = $('#name'+id).val();
   let surname = $('#surname'+id).val();
   let post = $("#select"+id+" option:selected").val();


   $.ajax({
       url: 'http://localhost/Company/Test/public/save_employee',
       type: "POST",
       data: {'name':name,'surname':surname,'post':post,'id':id},
       success: function() {
           alert("+");
       },
       error: function(response) {
           alert("-");
       }
   });

});
$('.select_class').on('change',function () {
    let val = $(this).find('option:selected')[0].dataset.salary;
    let id = $(this)[0].dataset.id;
    $('#salary'+id).text(val);
});

    $('.delete_employee').on('click',function () {
        let id = this.dataset.id;
        $.ajax({
            url: 'http://localhost/Company/Test/public/delete_employee',
            type: "POST",
            data: {'id':id},
            success: function() {
                $('#tr'+id).remove().end();
            },
            error: function(response) {
                alert("-");
            }
        });

    });
    $('.add_employee').on('click',function () {
        let id = this.dataset.id;
        let name = $('#new_name').val();
        let surname = $('#new_surname').val();
        let post = $('#select_new').find('option:selected')[0].dataset.id;
        $.ajax({
            url: 'http://localhost/Company/Test/public/add_employee',
            type: "POST",
            data: {'name':name,'surname':surname,'post':post},
            success: function() {
                alert("+");
            },
            error: function(response) {
                alert("-");
            }
        });

    });

    $('#new_coment').on('click',function () {
        let body = $('#body_coment').val();
        let id = $('#body_coment')[0].dataset.id;

        $.ajax({
            url: 'http://localhost/Company/Test/public/add_coment',
            type: "POST",
            data: {'body':body,'id':id},
            success: function(response) {
                $('#coment_list').append('<li class="media">\n' +
                    '                <div class="media-body">\n' +
                    '                    <div class="media-heading">\n' +
                    '                        <div class="author">'+response['name'] +'</div>\n' +
                    '                        <div class="metadata">\n' +
                    '                            <span class="date">'+response['time'] +'</span>\n' +
                    '                        </div>\n' +
                    '                    </div>\n' +
                    '                    <div class="media-text text-justify">'+response['body'] +'</div>\n' +
                    '                </div>\n' +
                    '            </li><hr>');
                console.log(response);
            },
            error: function(response) {
                console.log(response);
                alert('12')

            }
        });
    });

































});