@extends('layouts.admin')
@section('content')
    <div id="main">
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('task.add.submit') }}" method="POST" id="form">
                        <fieldset>
                            <input type="hidden" name="task__id" value="{{ $task_data->id ?? '' }}">
                            @php($task_data_json = json_decode($task_data->task_desc))
                            <legend class="text-center">
                                Add New Tasks <br>
                                <small>{{ $data->name }}</small>
                            </legend>
                            <input type="hidden" value="1" name="index" id="index">
                            <label for="game_type">Game Type *</label>
                            <div class="input-group justify-content-between w-100 g-3" style="flex-wrap:nowrap">
                                <div class="form-group w-100">
                                    <select class="form-select" name="game_type" id="game_type">
                                        <option value="creative_image">Creative Image</option>
                                        <option value="mcqs">Multiple Choice Questions</option>
                                        <option value="qr_code">QR Code Scan</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-success" id="choose_type" style="z-index:1"
                                        type="button">Choose</button>
                                </div>
                            </div>
                            <div id="type_result">
                                @if (!empty($task_data_json->creative_image))
                                    @foreach ($task_data_json->creative_image as $item)
                                        <div id="creative-{{ $loop->index }}">
                                            <div class="form-group">
                                                <label for="starting_point">Task Heading *</label>
                                                <input class="form-control" value="{{ $item->task_heading }}" type="text"
                                                    name="task_heading[]">
                                            </div>
                                            <div class="form-group">
                                                <label for="starting_point">Task Details *</label>
                                                <textarea class="form-control" type="text" name="task_details[]">{{ $item->task_details }}</textarea>
                                            </div>
                                            <div class="form-group input-group w-50">
                                                <button data-target="#creative-{{ $loop->index }}"
                                                    class="btn btn-danger remove__answer form-control" style="z-index:1"
                                                    type="button">X</button>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                                @php($question__index = 0)
                                @if (!empty($task_data_json->mcqs))
                                    @foreach ($task_data_json->mcqs as $item)
                                        <div id="questions__div__{{ $loop->index }}">
                                            <div class="form-group">
                                                <label for="starting_point">Question *</label>
                                                <input value="{{ $item->question }}" class="form-control question__input"
                                                    type="text" name="question[]">
                                            </div>
                                            {{-- @dd($item->answers[$loop->index]) --}}
                                            @foreach ($item->answers as $answer)
                                                <div id="answer-{{ $loop->index }}">

                                                    <div class="input-group justify-content-between w-100 gx-3 align-items-end"
                                                        style="flex-wrap:nowrap; gap:20px">
                                                        <div class="form-group w-100">
                                                            <label for="starting_point">Answer *</label>
                                                            <input value="{{ $answer->answer }}"
                                                                class="form-control mcq__answer" type="text"
                                                                name="answer[{{ $loop->parent->index }}][]">
                                                        </div>

                                                        <div class="form-group input-group w-50">

                                                            <button data-type="answer"
                                                                data-target="#answer-{{ $loop->index }}"
                                                                class="btn btn-danger remove__answer form-control"
                                                                style="z-index:1" type="button">X</button>
                                                        </div>

                                                    </div>
                                                    <div class="form-group d-flex">
                                                        <label class="m-3" for="right-answer-{{ $loop->index }}">Right
                                                            Answer?</label>
                                                        <input id="t_id_{{ $loop->index }}"
                                                            @if ($answer->true == 1) checked @endif type="hidden"
                                                            name="right__answer[{{ $loop->parent->index }}][]"
                                                            value="0">
                                                        <input class="form-check ml-3"
                                                            onchange="$('#t_id_{{ $loop->index }}').val(this.checked?1:0)"
                                                            id="right-answer-{{ $loop->index }}" value="true"
                                                            type="checkbox"
                                                            name="right__answer__[{{ $loop->parent->index }}][]">
                                                    </div>
                                                </div>
                                            @endforeach
                                            <div class="input-group justify-content-between w-100 g-3 align-items-end"
                                                style="flex-wrap:nowrap">
                                                <div class="form-group  w-100 ml-3 btn-group">
                                                    <button data-id='#answers__div__{{ $loop->index }}'
                                                        data-value="{{ $loop->index }}"
                                                        class="btn btn-warning add__answer form-control" style="z-index:1"
                                                        type="button">Add Options</button>
                                                    <button data-type="question"
                                                        data-target="#questions__div__{{ $loop->index }}"
                                                        class="btn btn-danger remove__answer form-control" style="z-index:1"
                                                        type="button">X</button>
                                                </div>
                                            </div>

                                        </div>
                                        @php($question__index++)
                                    @endforeach
                                @endif
                                @if (!empty($task_data_json->qr_text))
                                    @foreach ($task_data_json->qr_text as $item)
                                        <div id="qr__div__{{ $loop->index }}" class="form-group qr">
                                            Generated QR Code
                                            <label for="">Text For QR Code</label>
                                            <input type="text" placeholder="Text here..."
                                                value="{{ $item->qr_text ?? 'Text here...' }}" name="qr_text[]"
                                                class="form-control" id="qrText">
                                            <div class="m-5 text-center w-100" id="qrcode"></div>
                                            <div class="form-group  w-100 ml-3 btn-group">
                                                <button data-target="#qr__div__{{ $loop->index }}"
                                                    class="btn btn-danger remove__answer form-control" style="z-index:1"
                                                    type="button">X</button>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>

                            <div class="form-group">
                                <input class="btn btn-warning form-control fs-4 rounded-0" type="submit"
                                    value="Next Step" name="create_game" id="create_game">
                            </div>

                            <div class="form-group">
                                <input type="hidden" name="number_of_tasks" id="number_of_tasks"
                                    value="{{ $question__index }}">
                                <input type="hidden" name="number_of_mcqs" id="number_of_mcqs"
                                    value="{{ $question__index - 1 }}">
                                <input type="hidden" name="game_id" value="{{ $data->id }}">
                                <div id="results" style="display: none" class="alert alert-danger">

                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ asset('js/qrcode.js') }}"></script>
    <script type="text/javascript">
        // var qrcode = new QRCode("qrcode");

        function makeCode() {
            var elText = document.getElementById('qrText');
            new QRCode(document.getElementById("qrcode"), elText.value);
        }

        makeCode();

        // $("#qrText").on("blur", function() {
        //     makeCode();
        // }).
        $("#qrText").on("input", function(e) {
            e.preventDefault()
            makeCode();
        });
    </script>
    <script>
        $(document).ready(function() {

            $("#choose_type").on('click', function(e) {
                var index__val = $('#index').val();
                e.preventDefault();
                let __str = "";
                let __qr = "";
                qr = false;
                question__val = $('#number_of_mcqs').val();
                let __value = $('#game_type').val();

                switch (__value) {
                    case 'creative_image':
                        __str =
                            `<div id="creative-${index__val}">
                                <div class="form-group">
                                    <label for="starting_point">Task Heading *</label>
                                    <input class="form-control" type="text" name="task_heading[]">
                                </div>
                                <div class="form-group">
                                    <label for="starting_point">Task Details *</label>
                                    <textarea class="form-control" type="text" name="task_details[]"></textarea>
                                </div>
                                <div class="form-group input-group w-50">
                                    <button data-target="#creative-${index__val}" class="btn btn-danger remove__answer form-control" style="z-index:1" type="button">X</button>
                                </div>
                            </div>`;


                        break;
                    case 'mcqs':
                        __str = `<div id="questions__div__${index__val}">
                            
                            <div class="form-group">
                                    <label for="starting_point">Question *</label>
                                    <input class="form-control question__input" type="text" name="question[]">
                                </div>
                                <div id="answers__div__${index__val}"></div>
                                <div class="input-group justify-content-between w-100 g-3 align-items-end" style="flex-wrap:nowrap">
                                <div class="form-group  w-100 ml-3 btn-group">
                                    <button data-id='#answers__div__${index__val}' data-value="${question__val}" class="btn btn-warning add__answer form-control" style="z-index:1" type="button">Add Options</button>
                                    <button data-type="question" data-target="#questions__div__${index__val}" class="btn btn-danger remove__answer form-control" style="z-index:1" type="button">X</button>
                                </div>
                                </div>

                            </div>`
                        $('#number_of_mcqs').val(Number($('#number_of_mcqs').val()) + Number(1))
                        break;
                    case 'qr_code':
                        __qr = `<div id="qr__div__${index__val}" class="form-group qr">
                                Generated QR Code
                                <label for="">Text For QR Code</label>
                                <input type="text" placeholder="Text here..." value="Text here" name="qr_text[]" class="form-control" id="qrText">
                                <div class="m-5 text-center w-100"  id="qrcode"></div>
                                <div class="form-group  w-100 ml-3 btn-group">
                                    <button data-target="#qr__div__${index__val}" class="btn btn-danger remove__answer form-control" style="z-index:1" type="button">X</button>
                                </div>
                            </div>`
                        if ($('.qr').length < 1) {
                            qr = true;
                        }
                        break;
                    default:
                        alert(__value);
                }
                $("#number_of_tasks").val(Number($("#number_of_tasks").val()) + Number(1))
                if (qr == true) {
                    $('#type_result').append(__qr)
                    makeCode();
                } else {
                    $('#type_result').append(__str)

                }

                console.log('true')
                $('#index').val(Number(index__val) + 1)

            })

            $('#game_image').change(function(e) {
                var input = e.target;
                var reader = new FileReader();
                reader.onload = function() {
                    $('#output').attr('src', reader.result);
                    $('#output').show();
                };
                reader.readAsDataURL(input.files[0]);
            });

            $(document).on('click', '.add__answer', function(e) {
                e.preventDefault();
                $(this).text('Add Another Option')
                index__val = $('#index').val();
                question__val = $('#number_of_mcqs').val();
                __str = `<div id="answer-${index__val}">
                    
                    <div  class="input-group justify-content-between w-100 gx-3 align-items-end" style="flex-wrap:nowrap; gap:20px">
                                <div class="form-group w-100">
                                    <label for="starting_point">Answer *</label>
                                    <input class="form-control mcq__answer" type="text" name="answer[${question__val}][]">
                                </div>
                                
                                <div class="form-group input-group w-50">
                                    
                                    <button data-type="answer" data-target="#answer-${index__val}" class="btn btn-danger remove__answer form-control" style="z-index:1" type="button">X</button>
                                </div>
                                
                            </div>
                            <div class="form-group d-flex"> 
                                <label class="m-3" for="right-answer-${index__val}">Right Answer?</label>
                                <input id="t_id_${index__val}" type="hidden" name="right__answer[${question__val}][]" value="0">
                                <input class="form-check ml-3" onchange="$('#t_id_${index__val}').val(this.checked?1:0)" id="right-answer-${index__val}" value="true" type="checkbox" name="right__answer__[${question__val}][]"> 
                            </div>
                    </div>
                            `;
                $('#index').val(Number(index__val) + 1)
                target__id = $(this).data('id')
                $(target__id).append(__str)

            })
        });

        $(document).on('click', '.remove__answer', function(e) {
            e.preventDefault();
            target__id = $(this).data('target');
            if (confirm('Are you sure you want to remove this?') == true) {
                $(target__id).remove();
                if ($(this).data('type') !== 'answer') {
                    $("#number_of_tasks").val(Number($("#number_of_tasks").val()) - Number(1))
                }
                if ($(this).data('type') == 'question') {
                    $("#number_of_mcqs").val(Number($("#number_of_mcqs").val()) - Number(1));
                }
            }

        })
        $('#form').submit(function(e) {
            __m = 0;
            __msg = "";
            if ($('#number_of_tasks').val() <= 0) {
                __m = 1;
                __msg = "Please add atleast one task";
            }

            if ($('.question__input').length != 0) {
                if ($('.mcq__answer').length == 0) {
                    __m = 1;
                    __msg = "Please choose atleast one answer of MCQs";
                }
            }

            e.preventDefault();
            if (__m == 0) {

                $('#waveLoader')
                    .css("display", "flex")
                    .hide()
                    .fadeIn();
                $('#results').fadeOut();

                $('#results').html("");

                let $this = $(this);
                let form_data = new FormData($(this)[0]);
                // let image_file = $('#game_image')[0].files[0];
                // form_data.append('background_image',image_file);

                $.ajax({
                    type: 'post',
                    url: $this.attr('action'),
                    data: form_data,
                    dataType: false,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        $('#waveLoader').fadeOut();
                        console.log(response);
                        $('#results')
                            .css("display", "flex")
                            .hide()
                            .fadeIn();
                        $('#results').html(response);
                        if (response.status == "success") {
                            $('#results')
                                .addClass('alert-success')
                                .removeClass('alert-danger')
                                .html(response.success);
                            // $('#form').trigger("reset");
                        }
                    },
                    error: function(errors) {
                        $('#waveLoader').fadeOut();
                        $('#results')
                            .css({
                                "display": "flex"
                            })
                            .addClass('alert-danger')
                            .removeClass('alert-class')
                            .hide()
                            .fadeIn();
                        $('#results').html(errors.responseJSON.message);

                        console.log(errors.responseJSON.message);
                    }
                });
            } else {
                alert(__msg);
            }
        });
    </script>
@endsection
