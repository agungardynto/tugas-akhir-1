$(document).ready(function () {
    var dt = $('#karyawan').DataTable({
        "processing": true,
        "serverSide": true,
        "pageLength": 5,
        // "responsive": true,
        "ajax": {
            url: "dtx/karyawan"
        },
        "columns": [{
                "class": "details-control",
                "orderable": false,
                "data": null,
                "defaultContent": ""
            },
            {
                "data": "nama"
            },
            {
                "data": "jk"
            },
            {
                "data": "umur"
            },
            {
                "data": "jabatan"
            },
            {
                "data": "pendidikan"
            },
            {
                "data": "nomor_hp"
            },
            {
                "data": "status"
            },
        ],
        "order": [
            [1, 'asc']
        ]
    });
    var detailRows = [];
    $('#karyawan tbody').on('click', 'tr td.details-control', function () {
        var tr = $(this).closest('tr');
        var row = dt.row(tr);
        var idx = $.inArray(tr.attr('id'), detailRows);

        if (row.child.isShown()) {
            tr.removeClass('details');
            row.child.hide();
            detailRows.splice(idx, 1);
        } else {
            tr.addClass('details');
            row.child(format(row.data())).show();
            if (idx === -1) {
                detailRows.push(tr.attr('id'));
            }
        }
    });
    dt.on('draw', function () {
        $.each(detailRows, function (i, id) {
            $('#' + id + ' td.details-control').trigger('click');
        });
    });
});
