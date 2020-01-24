(function() {
    $(document).ready(function(){
        $('#dataPost').DataTable({
            "order": [[ 3, "desc" ]],
            initComplete: function () {
                this.api().columns('.jenis').every( function () {
                    var column = this;
                    var select = $('<select name="dataPost_length" aria-controls="dataPost" class="custom-select custom-select-sm form-control form-control-sm" id="exampleFormControlSelect1"><option value=""></option></select>')
                        .appendTo( $('#typePost') )
                        .on( 'change', function () {
                            var val = $.fn.dataTable.util.escapeRegex(
                                $(this).val()
                            );

                            column
                                .search( val ? '^'+val+'$' : '', true, false )
                                .draw();
                        });

                    column.data().unique().sort().each( function ( d, j ) {
                        select.append( '<option value="'+d+'">'+d+'</option>' )
                    });
                });
            }
        });
        $('#dataPostPerizinan').DataTable({
            "order": [[ 4, "desc" ]],
            initComplete: function () {
                this.api().columns('#jenis').every( function () {
                    var column = this;
                    var select = $('<select name="dataPost_length" aria-controls="dataPost" class="custom-select custom-select-sm form-control form-control-sm" id="exampleFormControlSelect1"><option value=""></option></select>')
                        .appendTo( $('#typePostJenis') )
                        .on( 'change', function () {
                            var val = $.fn.dataTable.util.escapeRegex(
                                $(this).val()
                            );

                            column
                                .search( val ? '^'+val+'$' : '', true, false )
                                .draw();
                        });

                    column.data().unique().sort().each( function ( d, j ) {
                        select.append( '<option value="'+d+'">'+d+'</option>' )
                    });
                });
                this.api().columns('#kategori').every( function () {
                    var column = this;
                    var select = $('<select name="dataPost_length" aria-controls="dataPost" class="custom-select custom-select-sm form-control form-control-sm" id="exampleFormControlSelect1"><option value=""></option></select>')
                        .appendTo( $('#typePostKategori') )
                        .on( 'change', function () {
                            var val = $.fn.dataTable.util.escapeRegex(
                                $(this).val()
                            );

                            column
                                .search( val ? '^'+val+'$' : '', true, false )
                                .draw();
                        });

                    select.append( '<option value="3 Bulan">3 Bulan</option>' );
                    select.append( '<option value="6 Bulan">6 Bulan</option>' );
                    select.append( '<option value="1 Tahun">1 Tahun</option>' );
                    select.append( '<option value="2 Tahun">2 Tahun</option>' );
                });
            }
        });
        $('#dataContract').DataTable({
            "order": [[ 1, "desc" ]]
        });
        $('#dataLog').DataTable({
            "ordering": false,
            "lengthMenu": [[3, 5, 10, 25, -1], [3, 5, 10, 25, "All"]]
        });
        $('#dataLogDetail').DataTable({
            "order": [[ 3, "desc" ]]
        });
        $('#dataReminder').DataTable({
            "order": [[ 4, "desc" ]]
        });
    });
})(jQuery);
