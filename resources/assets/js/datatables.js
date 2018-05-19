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

  $('#datatable_roles').DataTable({
    ajax: '/admin/roles/table',
    columns: [
      {data: 'name', name: 'name'},
      {data: 'created_at', name: 'created_at'},
      {data: 'action', name: 'action', orderable: false, searchable: false}
    ]
  });

  $('#datatable_permissions').DataTable({
    ajax: '/admin/permissions/table',
    columns: [
      {data: 'name', name: 'name'},
      {data: 'created_at', name: 'created_at'},
      {data: 'action', name: 'action', orderable: false, searchable: false}
    ]
  });

  $(document).on('click', '.btn-danger', function (e) {
    e.preventDefault();

    swal({
      title: "¿Estás seguro?",
      text: "Una vez eliminado, no podrás recuperar el registro",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
      .then((willDelete) => {
        if (willDelete) {
          $.ajax({
            url: $(this).prop('href'),
            type: 'DELETE',
          }).done(function () {
            location.reload();
          });
        } else {
          swal("No se ha eliminado el registro");
        }
      });
  });
});