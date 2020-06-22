$(document).ready(function () {
    var dt = $('#jabatan').DataTable({
        "processing": true,
        "serverSide": true,
        "pageLength": 5,
        "ajax": {
            url: "dtx/jabatan"
        },
        "columns": [{
                "class": "details-control",
                "orderable": false,
                "data": null,
                "defaultContent": ""
            },
            {
                "data": "jabatan"
            },
        ],
        "order": [
            [1, 'asc']
        ]
    });
    var detailRows = [];
    $('#jabatan tbody').on('click', 'tr td.details-control', function () {
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
