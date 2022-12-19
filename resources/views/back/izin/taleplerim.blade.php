@extends('layouts.back.master')
@section('css')


    <link href="{{asset('tema/public/')}}/assets/css/query.dataTables.min.css" rel="stylesheet" id="user-style-default">
@endsection
@section('content')
    <div class="container">
        @if(session('success'))

            <div class="alert alert-danger border-2 d-flex align-items-center" role="alert">
                <div class="bg-danger me-3 icon-item"><span class="fas fa-times-circle text-white fs-3"></span></div>
                <p class="mb-0 flex-1">{{session('success')}}</p>
                <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

    <div class="row g-3">

        <div class="col-12">

            <div class="card mb-3 mt-3" >
                <div class="card-header">
                    <div class="row flex-between-end">
                        <div class="col-auto align-self-center">
                            <h5 class="mb-0" data-anchor="data-anchor" id="jquery-datatables-default-example">İzin Taleplerim<a class="anchorjs-link " aria-label="Anchor" data-anchorjs-icon="#" href="#jquery-datatables-default-example" style="padding-left: 0.375em;"></a></h5>
                        </div>

                    </div>
                </div>
                <div class="card-header">
                    <div class="row flex-between-end">
                        <div class="table-responsive">
        <table id="example" class="display mt-2  table-responsive " style="">
            <thead>
            <tr>

                <th >İzin Türü</th>
                <th>Başlangıç Tarihi</th>
                <th>Bitiş Tarihi</th>
                <th>Durum</th>
                <th width="25%">İşlem</th>

            </tr>
            </thead>

        </table>

            </div>
        </div>
    </div>
            </div>
        </div>
    </div>
    </div>

@endsection
@section('js')


    <script src="{{asset('tema/public/')}}/vendors/jquery/jquery.dataTables.min.js"> </script>
    <script>
        $(function() {
            $('#example').DataTable({
                "responsive": true,
                "dom": '<"html5buttons"B>lTfgitp',
                "language": {
                    "emptyTable": "Gösterilecek ver yok.",
                    "processing": "Veriler yükleniyor",
                    "sDecimal": ".",
                    "sInfo": "_TOTAL_ kayıttan _START_ - _END_ arasındaki kayıtlar gösteriliyor",
                    "sInfoFiltered": "(_MAX_ kayıt içerisinden bulunan)",
                    "sInfoPostFix": "",
                    "sInfoThousands": ".",
                    "sLengthMenu": "Sayfada _MENU_ kayıt göster",
                    "sLoadingRecords": "Yükleniyor...",
                    "sSearch": "Ara:",
                    "sZeroRecords": "Eşleşen kayıt bulunamadı",
                    "oPaginate": {
                        "sFirst": "İlk",
                        "sLast": "Son",
                        "sNext": "Sonraki",
                        "sPrevious": "Önceki"
                    },
                    "oAria": {
                        "sSortAscending": ": artan sütun sıralamasını aktifleştir",
                        "sSortDescending": ": azalan sütun sıralamasını aktifleştir"
                    },
                    "select": {
                        "rows": {
                            "_": "%d kayıt seçildi",
                            "0": "",
                            "1": "1 kayıt seçildi"
                        }
                    }
                },
                order: [[3, 'desc']],
                processing: true,
                serverSide: true,
                ajax: "{{ route('izin.taleplerim') }}",
                columns: [
                   //yukarıda routtan çektiğimiz dataları burada tabloya sıra sıra yazdırdık. ancak datatablede burada data kdar sutun olmalı
                    { data: 'izin_tur', name: 'izin_tur' },
                    { data: 'baslangic_tarih', name: 'baslangic_tarih' },
                    { data: 'bitis_tarih', name: 'bitis_tarih' },
                    { data: 'durum', name: 'durum' },
                    {data: 'gor', name: 'gor', orderable: false, searchable: false}, //controllerdan dönen addcolumnuda burada belirtmek zorundayız.
                ]
            });
        });
    </script>
    <script language="javascript"> function confirmDel() { var agree=confirm("Bu ilanı silmek istediğinizden emin misiniz?\nBu işlem geri alınamaz!"); if (agree) { return true ; } else { return false ;} } </script>
@endsection
<!-- <section> close ============================-->
<!-- ============================================-->




<!-- ============================================-->
<!-- <section> begin ============================-->
