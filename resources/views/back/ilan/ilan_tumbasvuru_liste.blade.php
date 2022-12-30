@extends('layouts.back.master')
@section('css')


    <link href="{{asset('tema/public/')}}/assets/css/query.dataTables.min.css" rel="stylesheet" id="user-style-default">
@endsection
@section('content')
    <div class="container">
        @if(session('success'))
            <div class="alert alert-danger">{{session('success')}}</div>
            @endif
    <div class="row g-3">

        <div class="col-12">

            <div class="card mb-3 mt-3" >
                <div class="card-header">
                    <div class="row flex-between-end">
                        <div class="col-auto align-self-center">
                            <h5 class="mb-0" data-anchor="data-anchor" id="jquery-datatables-default-example">Tüm Başvurular<a class="anchorjs-link " aria-label="Anchor" data-anchorjs-icon="#" href="#jquery-datatables-default-example" style="padding-left: 0.375em;"></a></h5>
                        </div>

                    </div>
                </div>
                <div class="card-header">
                    <div class="row flex-between-end">
                        <div class="table-responsive">
        <table id="example" class="display mt-2  table-responsive " style="">
            <thead>
            <tr>

                <th>Tc</th>
                <th>Ad</th>
                <th>Soyad</th>
                <th>Branş</th>
                <th width="30%">İşlem</th>

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
                ajax: "{{ route('ilan.tumbasvuruliste') }}",
                columns: [
                   //yukarıda routtan çektiğimiz dataları burada tabloya sıra sıra yazdırdık. ancak datatablede burada data kdar sutun olmalı
                    { data: 'tc', name: 'tc' },
                    { data: 'ad', name: 'soyad' },
                    { data: 'soyad', name: 'soyad' },
                    { data: 'brans', name: 'brans' },
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
