@extends('layouts.ujian')
@section('content')

@section('nav-item')
<li class="nav-item border-right pr-2">
    <span class="nav-link d-flex align-items-center" href="#"><span id="timer" style="font-size:14px"></span></span>
</li>
<li class="nav-item pl-2">
    <a class="nav-link d-flex align-items-center" data-target="#confirmExit" data-toggle="modal" style="gap: 5px;" href="#confirmExit"><i class="dw dw-logout1"></i> Keluar</a>
</li>

@endsection
<style>
    .pagination-ujian {
        display: flex;
        flex-wrap: wrap;
        gap: 5px;
    }

    .pagination-ujian button {
        width: 50px;
        height: 50px;
        border: none;
        border-radius: 0.4rem;
        text-align: center;
        box-sizing: border-box;
        background-color: #FFFFFF;
    }

    .pagination-ujian button:hover {
        background-color: #fbfbfb;
    }

    .pagination-ujian button.active {
        background-color: #ffc107;
        font-weight: bold;
        color: #FFFFFF;
        box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075) !important;
        border: 1px solid #ffc107;
    }

    .pagination-ujian button.active:hover {
        background-color: #eab30b;
    }

    .pagination-ujian button.answered {
        background-color: #1452cc;
        color: #FFFFFF;
    }

    .pagination-ujian button.answered:hover {
        background-color: #1f943a;
    }

    .option-text>ol>li {
        margin-bottom: 10px;
        margin-left: -20px;
    }
   
    .esai-column {
        margin-top: 15px;
    }

    .option-text>ol>li label p:last-child {
        margin: 0px;
    }

    .option-item, .option-item-komplek {
        display: none;
        position: relative;
    }

    .option-icon, .option-icon-komplek {
        display: block;
        width: 25px;
        height: 25px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        background: #FFFFFF;
        border: 2px solid #dcdcdc;
    }

    .option-icon-komplek {
        border-radius: 0%;
    }

    .option-item:checked~.option-icon, .option-item-komplek:checked~.option-icon-komplek {
        background: #1452cc;
        color: #FFFFFF;
        border-color: #1452cc;
    }

    .option-text>ol>li {
        display: flex;
        align-items: flex-start;
        gap: 10px;
    }

    .option-text>ol>li label {
        cursor: pointer;
    }

    .question-item {
        display: block;
        margin-bottom: 20px;
    }

    .btn-prev,
    .btn-next,
    .btn-finish {
        padding: 10px 20px;
        border: none;
        border-radius: 0.4rem;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        color: #1452cc;
        background: #f5f5f5;
    }

    .btn-prev:hover,
    .btn-next:hover,
    .btn-finish:hover {
        background: #e8e4e4;
    }
</style>

<div class="row content justify-content-center">
    <div class="page-inner col-xl-8">
        <form action="{{ route('peserta_tes.finish', [$tes->id, $token]) }}" method="POST" id="form_ujian" class="notranslate" style="-moz-user-select: none; -webkit-user-select: none; -ms-user-select:none; user-select:none;-o-user-select:none;" unselectable="on">
        @csrf
            @foreach ($soals as $key => $soal)
            <div class="question-item" data-key="{{ $key + 1 }}" data-id="{{ $soal->id }}" data-type="PG">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">
                            Soal nomor {{ $key + 1 }} dari {{ count($soals) }} soal
                            &nbsp;
                        </h4>
                    </div>
                    <div class="card-body">
                        <input type="hidden" name="ans[{{ $key }}][id]" value="{{ $soal->id }}">
                        <div class="question-text">
                            {!! $soal->soal !!}
                        </div>
                        <div class="option-text mt-4">
                            <ol>
                                @foreach(json_decode($soal->opsi) as $alp => $opsi)
                                <li>
                                    <div>
                                        <input class="option-item" type="radio" name="ans[{{ $key }}][answer]" id="option_{{ $key }}_{{ $alp }}" value="{{ $alp }}">
                                        <label class="option-icon" for="option_{{ $key }}_{{ $alp }}">{{ $alp }}</label>
                                    </div>
                                    <div>
                                        <label for="option_{{ $key }}_{{ $alp }}">
                                            {!! $opsi !!}
                                        </label>
                                    </div>
                                </li>
                                @endforeach
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
                @if ($key == count($soals) - 1)
                    <div class="card-box p-3 mt-4 text-right">
                        <button type="button" class="btn btn-primary ml-2" data-toggle="modal" data-target="#confirmFinish">Selesai <i class="fa fa-check-circle-o" aria-hidden="true"></i></button>
                    </div>
                @endif
            @endforeach
        </form>
    </div>
</div>

<div class="modal fade" id="confirmExit" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Peringatan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('peserta_tes.exit', [$tes->id, $token]) }}" method="POST" id="form_exit">
                    @csrf
                    @method('DELETE')
                </form>
                <p>Apakah yakin Anda ingin keluar dari ujian yang sedang berlangsung? Soal yang telah Anda jawab tidak akan tersimpan dan ujian tidak akan dinilai.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-danger" onclick="document.getElementById('form_exit').submit();">Keluar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="confirmFinish" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Konfirmasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="mb-4">Apakah yakin Anda telah menyelesaikan ujian ini? Pastikan Anda telah memeriksanya.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary" onclick="document.getElementById('form_ujian').submit();">Selesai</button>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script type="text/javascript" async src="https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.0/MathJax.js?config=MML_HTMLorMML"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.4/MathJax.js?config=TeX-AMS_HTML"></script>
<script>
    var startedAt = "{{ session()->get('tes_saat_ini')[$tes->id]['dimulai_pada'] }}";
    var duration = "{{ $tes->durasi }}";
    const second = 1000,
        minute = second * 60,
        hour = minute * 60;
    const dimulai = new Date(startedAt);
    const countDown = new Date(dimulai.getTime() + duration * 60000);
    var x = setInterval(() => {
        let now = new Date().getTime(),
        distance = countDown - now;

        if (distance < 0) {
            clearInterval(x);
            document.getElementById('form_ujian').submit();
        } else {
            var h = Math.floor(((distance) / (hour)));
            var m = Math.floor((distance % (hour)) / minute);
            var s = Math.floor((distance % (minute)) / second);
            document.getElementById('timer').innerHTML = `${h < 10 ? '0' : ''}${h}:${m < 10 ? '0' : ''}${m}:${s < 10 ? '0' : ''}${s}`;
        }
    }, 0);

    function getQuestionAt(index) {
        var element = document.querySelectorAll('.question-item')[index];
        return element;
    }

    function getQuestionAnswer(index) {
        var question = getQuestionAt(index);
        var type = question.getAttribute('data-type');
        
        if (type == 'PG' || type == 'ESAI') {
            var answer = document.getElementsByName(`ans[${index}][answer]`);
            var answerValue = null;
            answer.forEach((element, ind) => {
                if (element.localName == 'input' && element.getAttribute('type') == 'radio' && element.checked) {
                    answerValue = element.value;
                } else if (element.localName == 'textarea' && element.value !== '') {
                    answerValue = element.value;
                }
            });
            return answerValue;
        } else if (type == 'PG-KOMPLEK') {
            var answerElement = [...question.getElementsByTagName(`input`)];
            var answerValue = [];
            answerElement.forEach((element, ind) => {
                if (element.getAttribute('type') == 'checkbox' && element.checked == true && element.value !== null) {
                    answerValue.push(element.value);
                }
            });

            return answerValue.length > 0 ? answerValue : null ;
        } else if (type == 'MEMASANGKAN') {
            var answerElement = [...question.getElementsByTagName('select')];
            var answerValue = [];
            var isChecked = 0;
            answerElement.forEach((element, ind) => {
                if (element.value != null && element.value != '') {
                    isChecked += 1;
                }

                if (element.value != null && element.value) {
                    answerValue.push(element.value);
                }
            });

            return isChecked > 0 ? answerValue : null;
        }
    }
    function setToLocalStorage() {
        var current = this;
        if (current.localName == 'input') {
            var current = this.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode;
        } else if(current.localName == 'select') {
            var current = current.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode;
        } else {
            var current = this.parentNode.parentNode.parentNode;
        }

        var currentIndex = parseInt(current.getAttribute('data-key')) - 1;
        var id = current.getAttribute('data-id');
        var answer = getQuestionAnswer(currentIndex);
        var type = current.getAttribute('data-type');
        var data = {
            'id'        : id,
            'answer'    : answer,
            'type'      : type,
            'exam_id'   : "{{ $tes->id }}"
        };
        if (localStorage.getItem("{{ 'tes_' . auth()->guard(session()->get('role'))->user()->id . '_' . $tes->id  }}") !== null) {
            var current = JSON.parse(localStorage.getItem("{{ 'tes_' . auth()->guard(session()->get('role'))->user()->id . '_' . $tes->id  }}"));
            current[`${data.exam_id}_${data.id}`] = data;
        } else {
            var current = {};
            current[`${data.exam_id}_${data.id}`] = data;
        }
        localStorage.setItem("{{ 'tes_' . auth()->guard(session()->get('role'))->user()->id . '_' . $tes->id  }}", JSON.stringify(current));
    }

    function objectSearch(text, collection) {
        var keys = Object.keys(collection);
        
        for (var i = 0; i < keys.length; i++) {
            if (collection[keys[i]].id == text) {
                return collection[keys[i]];
            }
        }
        return undefined;
    }

    function setAnsweredQuestion() {
        var storage = JSON.parse(localStorage.getItem("{{ 'tes_' . auth()->guard(session()->get('role'))->user()->id . '_' . $tes->id  }}")) ?? {};
        var questions = document.querySelectorAll('.question-item');
        questions.forEach((element, index) => {
            var collection = objectSearch(element.getAttribute('data-id'), storage);
            if (collection) {
                if (collection.type == 'PG' && collection.answer != null) {
                    [...element.querySelectorAll('input[type="radio"]')].forEach((el, ind) => {
                        if (el.value == collection.answer) {
                            el.checked = true;
                        }
                    });
                } else if (collection.type == 'ESAI') {
                    element.querySelectorAll('textarea')[0].value = collection.answer;
                } else if (collection.type == 'PG-KOMPLEK' && collection.answer != null) {
                    [...element.querySelectorAll('input[type="checkbox"]')].forEach((el, ind) => {
                        if (collection.answer.includes(el.value)) {
                            el.checked = true;
                        }
                    });
                } else if (collection.type == 'MEMASANGKAN' && collection.answer != null) {
                    [...element.querySelectorAll('select')].forEach((el, ind) => {
                        el.value = collection.answer[ind];
                    });
                }
            }
        });
    }
    document.querySelectorAll('input[type="radio"]').forEach((element, index) => {
        element.addEventListener('click', setToLocalStorage);
    });
    document.querySelectorAll('input[type="checkbox"]').forEach((element, index) => {
        element.addEventListener('click', setToLocalStorage);
    });
    document.querySelectorAll('select').forEach((element, index) => {
        element.addEventListener('change', setToLocalStorage);
    });
    document.querySelectorAll('textarea').forEach((element, index) => {
        element.addEventListener('input', setToLocalStorage);
    });
    setAnsweredQuestion();
</script>
@endpush
