$(function() {
    $.extend(true, $.fn.dataTable.defaults, {
        "searching": true,
        "ordering": true
    });

    $('#datatable_users').DataTable({
        ajax: '/admin/users/table',
        columns: [
            {
                data: 'avatar', name: 'avatar', "render": function (data, type, full, meta) {
                    return `<a href="${data}" data-lightbox="image">
                            <img src="${data}" height="45" class="lazy" />
                        </a>`;
                }
            },
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'action', name: 'action', orderable: false, searchable: false}
        ]
    });

    $(document).on('click', '.btn-danger', function (e) {
        e.preventDefault();

        $.ajax({
            url: $(this).prop('href'),
            type: 'DELETE',
            data: {_token: window.Laravel.csrfToken}
        }).done(function () {
            location.reload();
        });
    });
});