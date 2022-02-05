@extends('layouts.layout')
@section('content')
<div class="content">
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Soal Tes</h4>
            <ul class="breadcrumbs">
                <li class="nav-home">
                    <a href="{{route('home')}}">
                        <i class="flaticon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="{{route('tes.index')}}">Tes</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Soal Tes</a>
                </li>
            </ul>
        </div>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                    Tambah Soal
                </h4>
            </div>
            <div class="card-body">
                @if( Session::get('error') !="")
                    <div class='alert alert-danger'><center><b>{{Session::get('error')}}</b></center></div>        
                @endif
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <form action="{{ route('tes.soal.update', [$tes->id, $soal->id]) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="soal">Soal</label>
                                <textarea name="soal" id="soal" cols="30" rows="5" class="form-control ckeditor @error('soal') is-invalid @enderror" required>{{ $soal->soal }}</textarea>
                                @error('soal')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="tipe_soal">Tipe Soal</label>
                                <select name="tipe_soal" id="tipe_soal" class="custom-select @error('tipe_soal') is-invalid @enderror" required>
                                    <option value=""></option>
                                    <option value="PG" selected>Pilihan Ganda</option>
                                </select>
                                @error('tipe_soal')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="ops">
                                <div class="form-group pg">
                                    <label for="">Opsi</label>
                                    <div>
                                        <table class="w-100">
                                            <tbody class="table-body">
                                                <?php 
                                                    $soal_opsi = json_decode($soal->opsi);
                                                ?>
                                                @foreach ( $soal_opsi as $key => $opsi)
                                                <tr>
                                                    <td>
                                                        <input type="radio" name="jawaban" value="{{ $key }}" {{ $soal->jawaban == $key ? 'checked' : '' }}>
                                                    </td>
                                                    <td>
                                                        <textarea name="opsi[{{ $key }}]" id="opsi{{ array_search($key, range('A', 'Z')) + 1 }}" cols="30" rows="10" class="ckeditor">{!! $opsi !!}</textarea>
                                                    </td>
                                                    <td>
                                                        <button class="btn btn-light btn-sm ml-1 remove-opsi"><i class="fa fa-times"></i></button>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                            <tfooter>
                                                <tr>
                                                    <td>
        
                                                    </td>
                                                    <td class="pt-2 text-right">
                                                        <button type="button" class="btn btn-light btn-sm add-opsi">Tambah Opsi</button>
                                                    </td>
                                                    <td>
        
                                                    </td>
                                                </tr>
                                            <tfooter>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="my-3 text-right">
                                <button type="submit" class="btn btn-md btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script src="{{url('ckeditor/ckeditor.js')}}"></script>
<script>
    CKEDITOR.plugins.addExternal('ckeditor_wiris', '{{url("ckeditor/node_modules/@wiris/mathtype-ckeditor4/plugin.js")}}');

    function initCkeditor(id) {
        var mathElements = [
            'math',
            'maction',
            'maligngroup',
            'malignmark',
            'menclose',
            'merror',
            'mfenced',
            'mfrac',
            'mglyph',
            'mi',
            'mlabeledtr',
            'mlongdiv',
            'mmultiscripts',
            'mn',
            'mo',
            'mover',
            'mpadded',
            'mphantom',
            'mroot',
            'mrow',
            'ms',
            'mscarries',
            'mscarry',
            'msgroup',
            'msline',
            'mspace',
            'msqrt',
            'msrow',
            'mstack',
            'mstyle',
            'msub',
            'msup',
            'msubsup',
            'mtable',
            'mtd',
            'mtext',
            'mtr',
            'munder',
            'munderover',
            'semantics',
            'annotation',
            'annotation-xml'
        ];

        CKEDITOR.replace(id, {
            extraPlugins: 'uploadimage,image2,ckeditor_wiris,eqneditor,nvd_math',
            mathJaxLib: 'https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.4/MathJax.js?config=TeX-AMS_HTML',
            height: 100,
            
            toolbar: [
                {
                    name: 'document',
                    items: ['Undo', 'Redo']
                },
                {
                    name: 'styles',
                    items: ['Format','FontSize']
                },
                {
                    name: 'basicstyles',
                    items: ['Bold', 'Italic', 'Strike', '-', 'RemoveFormat', 'Underline']
                },
                {
                    name: 'paragraph',
                    items: ['NumberedList', 'BulletedList']
                },
                {
                    name: 'links',
                    items: ['Link', 'Unlink']
                },
                {
                    name: 'presentation',
                    items: ['Image']
                },
                // {
                //     name: 'math',
                //     items: ['ckeditor_wiris_formulaEditor']
                // }
            ],

            enterMode: CKEDITOR.ENTER_DIV,

            // Upload images to a CKFinder connector (note that the response type is set to JSON).
            uploadUrl: "{{ route('web.upload_image') }}",

            filebrowserUploadUrl: "{{ route('web.upload_image') }}",
            filebrowserImageUploadUrl: "{{ route('web.upload_image') }}",

            stylesSet: [{
                    name: 'Narrow image',
                    type: 'widget',
                    widget: 'image',
                    attributes: {
                        'class': 'image-narrow'
                    }
                },
                {
                    name: 'Wide image',
                    type: 'widget',
                    widget: 'image',
                    attributes: {
                        'class': 'image-wide'
                    }
                }
            ],

            contentsCss: [
                'http://cdn.ckeditor.com/4.16.0/full-all/contents.css',
                'https://ckeditor.com/docs/ckeditor4/4.16.0/examples/assets/css/widgetstyles.css'
            ],

            image2_alignClasses: ['image-align-left', 'image-align-center', 'image-align-right'],
            image2_disableResizer: false,
            extraAllowedContent: mathElements.join(' ') + '()[]{*};img[data-mathml,data-custom-editor,role](Wirisformula)'
        });
    }

    $('.ckeditor').each((id, el) => {
        initCkeditor(el);
    });
</script>
@endpush

@push('scripts')
<script>

    function toAlpha(num) {
        return String.fromCharCode(num + 64);
    }

    var pg = `<div class="pg">
        <label for="">Opsi</label>
        <div>
            <table class="w-100">
                <tbody class="table-body">
                    <tr>
                        <td>
                            <input type="radio" name="jawaban" value="A">
                        </td>
                        <td>
                            <textarea name="opsi[A]" id="opsi1" cols="30" rows="10" class="ckeditor"></textarea>
                        </td>
                        <td>
                            <button class="btn btn-light btn-sm ml-1 remove-opsi"><i class="fa fa-times"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="radio" name="jawaban" value="B">
                        </td>
                        <td>
                            <textarea name="opsi[B]" id="opsi2" cols="30" rows="10" class="ckeditor"></textarea>
                        </td>
                        <td>
                            <button class="btn btn-light btn-sm ml-1 remove-opsi"><i class="fa fa-times"></i></button>
                        </td>
                    </tr>
                </tbody>
                <tfooter>
                    <tr>
                        <td>
                            
                        </td>
                        <td class="pt-2 text-right">
                            <button type="button" class="btn btn-light btn-sm add-opsi">Tambah Opsi</button>
                        </td>
                        <td>
                            
                        </td>
                    </tr>
                <tfooter>
            </table>
        </div>
    </div>`;

    var esai = `<div class="esai">
        <div class="form-group">
            <label for="jawaban">Jawaban</label>
            <textarea name="jawaban" id="jawaban" cols="30" rows="10" class="ckeditor"></textarea>
        </div>
    </div>`;

    var memasangkan = `<div class="memasangkan">
        <label for="">Pasangan</label>
        <div>
            <table class="w-100">
                <tbody class="table-body">
                    <tr>
                        <td>
                            <textarea name="memasangkan[opsi][A]" id="opsiA" cols="30" rows="10" class="ckeditor opsi"></textarea>
                        </td>
                        <td>
                            <textarea name="memasangkan[jawaban][A]" id="jawabanA" cols="30" rows="10" class="ckeditor jawaban"></textarea>
                        </td>
                        <td style="width: 70px;">
                            <input type="number" name="memasangkan[poin][A]" class="form-control d-inline w-100 mx-1 poin" min="0" required>
                        </td>
                        <td>
                            <button class="btn btn-light btn-sm ml-2 remove-pasangan"><i class="fa fa-times"></i></button>
                        </td>
                    </tr>
                </tbody>
                <tfooter>
                    <tr>
                        <td class="pt-2 text-right">
                            <button type="button" class="btn btn-light btn-sm add-memasangkan-opsi">Tambah Opsi</button>
                        </td>
                        <td class="pt-2 text-right">
                            <button type="button" class="btn btn-light btn-sm add-memasangkan-jawaban">Tambah Pasangan</button>
                        </td>
                        <td>

                        </td>
                        <td>

                        </td>
                    </tr>
                <tfooter>
            </table>
        </div>
    </div>`;

    var pg_komplek = `<div class="pg-komplek">
        <label for="">Pilihan Ganda Komplek</label>
        <div>
            <table class="w-100">
                <tbody class="table-body">
                    <tr>
                        <td>
                            <input type="checkbox" name="jawaban[]" value="A">
                        </td>
                        <td>
                            <textarea name="opsi[A]" id="opsi1" cols="30" rows="10" class="ckeditor"></textarea>
                        </td>
                        <td>
                            <button class="btn btn-light btn-sm ml-1 remove-opsi-komplek"><i class="fa fa-times"></i></button>
                        </td>
                    </tr>
                </tbody>
                <tfooter>
                    <tr>
                        <td>

                        </td>
                        <td class="pt-2 text-right">
                            <button type="button" class="btn btn-light btn-sm add-opsi-komplek">Tambah Opsi</button>
                        </td>
                        <td>

                        </td>
                    </tr>
                <tfooter>
            </table>
        </div>
    </div>`;

    $('#tipe_soal').on('change', (e) => {
        e.preventDefault();
        e.stopImmediatePropagation();

        var value = $(e.currentTarget).val();
        var ops = $('.ops');

        $('input[name="poin"]').prop('readonly', true);

        if (value == 'PG') {
            ops.html(pg);
        } else if (value == 'ESAI') {
            ops.html(esai);
            $('input[name="poin"]').prop('readonly', false);
        } else if (value == 'MEMASANGKAN') {
            ops.html(memasangkan);
        } else if (value == 'PG-KOMPLEK') {
            ops.html(pg_komplek);
        } else {
            ops.html('');
        }

        ops.find('.ckeditor').each((id, el) => {
            initCkeditor(el);
        });
    });

    $('body').on('click', '.add-opsi', (e) => {
        e.preventDefault();
        e.stopImmediatePropagation();

        var opsi = $('.pg table .table-body tr').length + 1;

        var opsiHTML = `<tr>
            <td>
                <input type="radio" name="jawaban" value="${ toAlpha(opsi) }">
            </td>
            <td>
                <textarea name="opsi[${ toAlpha(opsi) }]" id="opsi${opsi}" cols="30" rows="10" class="ckeditor"></textarea>
            </td>
            <td>
                <button class="btn btn-light btn-sm ml-1 remove-opsi"><i class="fa fa-times"></i></button>
            </td>
        </tr>`;

        $('.pg table .table-body').append(opsiHTML);

        $('.pg table .table-body').find('tr').last().find('.ckeditor').each((id, el) => {
            initCkeditor(el);
        });
    });

    $('body').on('click', '.remove-opsi', (e) => {
        e.preventDefault();
        e.stopImmediatePropagation();

        $(e.currentTarget).parents('tr').remove();

        var elements = $('.pg table .table-body tr');

        elements.each((ind, el) => {
            $(el).find('input[type="radio"]').val(toAlpha(ind + 1));
            $(el).find('textarea').attr('name', `opsi[${ toAlpha(ind + 1) }]`);
            $(el).find('textarea').attr('id', `opsi${ ind + 1 }`);
        });
    });

    $('body').on('click', '.add-memasangkan-opsi', (e) => {
        e.preventDefault();
        e.stopImmediatePropagation();

        var trLength = $('.memasangkan .table-body tr').length + 1;

        var tr = `<tr>
            <td>
                <textarea name="memasangkan[opsi][${ toAlpha(trLength) }]" id="opsi${ toAlpha(trLength) }" cols="30" rows="10" class="ckeditor opsi"></textarea>
            </td>
            <td></td>
            <td style="width: 70px;"></td>
            <td>
                <button class="btn btn-light btn-sm ml-2 remove-pasangan"><i class="fa fa-times"></i></button>
            </td>
        </tr>`;

        $('.memasangkan .table-body').append(tr);

        $('.memasangkan .table-body tr').last().find('.ckeditor').each((ind, el) => {
            initCkeditor(el);
        });
    });

    $('body').on('click', '.add-memasangkan-jawaban', (e) => {
        e.preventDefault();
        e.stopImmediatePropagation();

        var trLength = $('.memasangkan .table-body tr').length;
        var jawabanLength = $('.memasangkan .table-body tr .jawaban').length;

        if (jawabanLength == trLength) {
            alert('Pasangan tidak boleh melebihi opsi!');
        } else {
            var html = `<textarea name="memasangkan[jawaban][${toAlpha(trLength)}]" id="jawaban${toAlpha(trLength)}" cols="30" rows="10" class="ckeditor jawaban"></textarea>`;
            var poin = `<input type="number" name="memasangkan[poin][${toAlpha(trLength)}]" class="form-control d-inline w-100 mx-1 poin" min="0" required>`;
            $(`.memasangkan .table-body tr:nth-child(${jawabanLength + 1})`).find('td:nth-child(2)').html(html);
            $(`.memasangkan .table-body tr:nth-child(${jawabanLength + 1})`).find('td:nth-child(3)').html(poin);
        }

        $(`.memasangkan .table-body tr:nth-child(${jawabanLength + 1})`).find('.jawaban').each((ind, el) => {
            initCkeditor(el);
        });
    });

    $('body').on('click', '.remove-pasangan', (e) => {
        e.preventDefault();
        e.stopImmediatePropagation();

        $(e.currentTarget).parents('tr').remove();

        var elements = $('.memasangkan .table-body tr');

        elements.each((ind, el) => {
            $(el).find('textarea.opsi').attr('name', `memasangkan[opsi][${ toAlpha(ind + 1) }]`);
            $(el).find('textarea.opsi').attr('id', `opsi${ toAlpha(ind + 1) }`);

            $(el).find('textarea.jawaban').attr('name', `memasangkan[jawaban][${ toAlpha(ind + 1) }]`);
            $(el).find('textarea.jawaban').attr('id', `jawaban${ toAlpha(ind + 1) }`);

            $(el).find('input.poin').attr('name', `memasangkan[poin][${ toAlpha(ind + 1) }]`);
            $(el).find('input.poin').attr('id', `poin${ toAlpha(ind + 1) }`);
        });
    });

    $('body').on('input', '.poin', (e) => {
        e.preventDefault();
        e.stopImmediatePropagation();

        var total = 0;

        $('.memasangkan .table-body tr .poin').each((ind, el) => {
            total += parseInt($(el).val());
        });

        $('input[name="poin"]').val(total);
    });

    $('body').on('click', '.add-opsi-komplek', (e) => {
        e.preventDefault();
        e.stopImmediatePropagation();

        var opsi = $('.pg-komplek table .table-body tr').length + 1;

        var opsiHTML = `<tr>
            <td>
                <input type="checkbox" name="jawaban[]" value="${ toAlpha(opsi) }">
            </td>
            <td>
                <textarea name="opsi[${toAlpha(opsi)}]" id="opsi${opsi}" cols="30" rows="10" class="ckeditor"></textarea>
            </td>
            <td>
                <button class="btn btn-light btn-sm ml-1 remove-opsi-komplek"><i class="fa fa-times"></i></button>
            </td>
        </tr>`;

        $('.pg-komplek table .table-body').append(opsiHTML);

        $('.pg-komplek table .table-body').find('tr').last().find('.ckeditor').each((id, el) => {
            initCkeditor(el);
        });
    });

    $('body').on('click', '.remove-opsi-komplek', (e) => {
        e.preventDefault();
        e.stopImmediatePropagation();

        $(e.currentTarget).parents('tr').remove();

        var elements = $('.pg-komplek table .table-body tr');

        elements.each((ind, el) => {
            $(el).find('input[type="checkbox"]').val(toAlpha(ind + 1));
            $(el).find('textarea').attr('name', `opsi[${ toAlpha(ind + 1) }]`);
            $(el).find('textarea').attr('id', `opsi${ ind + 1 }`);
        });
    });

</script>
@endpush