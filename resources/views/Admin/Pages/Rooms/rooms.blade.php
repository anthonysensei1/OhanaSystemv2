@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content pt-3">
            <div class="container-fluid">
                <div class="row text-end">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h4 class="mb-0">LIST OF ROOMS</h4>
                                <select class="form-control text-center ml-2" style="max-width: 300px" id="roomTypeSelect">
                                    <option value="" selected disabled>- Select Room Type -</option>
                                    <option value="all">Show all rooms</option>
                                    @foreach ($room_types as $room_type)
                                        <option class="_room_type_values" value="{{ $room_type['id'] }}">
                                            {{ $room_type['room_type'] }}</option>
                                    @endforeach
                                </select>
                                <button type="button" class="btn btn-success btn-md" style="margin-left: auto;"
                                    data-toggle="modal" data-target="#add_room">
                                    <i class="fas fa-plus"></i> Add Room
                                </button>
                            </div>
                            <div class="card-body">
                              <div class="divide_box">
                                  @foreach ($rooms as $room)
                                      <div id="carouselExampleAutoplaying{{ $loop->index }}" class="carousel slide img_fix_size" data-bs-ride="carousel" style="width: 310px; border: 2px solid #000;">
                                          <div class="carousel-inner">
                                              @foreach ($room['room_image'] as $index => $room_image)
                                                  <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                                      <img src="{{ asset('/images/' . $room_image) }}" class="d-block" alt="Room Image" style="width: 500px; height: 250px;">
                                                      <div style="width: 500px; height: 70px; background-color: #90EE90;">
                                                         <h5 class="text-center">{{ $room['room_type'] }}</h5>
                                                         <label class="d-block text-center">RATE: {{ $room['room_rate'] }}</label>
                                                      </div>
                                                  </div>
                                              @endforeach
                                          </div>
                                          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying{{ $loop->index }}" data-bs-slide="prev">
                                              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                              <span class="visually-hidden">Previous</span>
                                          </button>
                                          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying{{ $loop->index }}" data-bs-slide="next">
                                              <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                              <span class="visually-hidden">Next</span>
                                          </button>
                                      </div>
                                  @endforeach
                              </div>
                          </div>
                          
                        </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

    <!-- Add Dialog -->
    <div class="modal fade" id="add_room" data-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-gradient-success">
                    <h4 class="modal-title">Add New Room</h4>
                </div>
                <form action="{{ route('room_store') }}" class="formPost">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12 mb-2">
                                <div class="d-flex justify-content-between">
                                    <label>Upload Image :</label>
                                    <button type="button" class="btn-primary ml-1 rounded"
                                        style="width: 17%; height: 40px;" id="add_upload_image"><i
                                            class="fa fa-plus-circle"></i></button>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="row" id="upload_image_input">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="text" class="form-control" value="1"
                                                        name="room_image_hidden" readonly hidden>
                                                    <input type="file" class="custom-file-input" id="exampleInputFile">
                                                    <label class="custom-file-label" for="exampleInputFile">Choose
                                                        file</label>
                                                </div>
                                                <input type="text" class="form-control" name="room_image[]"
                                                    id="room_image1" readonly hidden>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <label for="room_no">Room No. :</label>
                                <input type="number" class="form-control" name="room_no" id="room_no" required>
                                <label for="room_name">Room Name :</label>
                                <input type="text" class="form-control" name="room_name" id="room_name" required>
                                <label for="room_no">Room Type :</label>
                                <select class="form-control" name="_room_type" id="_room_type" required>
                                    <option value="" selected disabled>- Select Type -</option>
                                    @foreach ($room_types as $room_type)
                                        <option class="_room_type_values" value="{{ $room_type['id'] }}"
                                            price="{{ $room_type['room_rate'] }}">{{ $room_type['room_type'] }}</option>
                                    @endforeach
                                </select>
                                <label for="room_rate">Rate :</label>
                                <input type="text" class="form-control" name="room_rate" id="room_rate" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-outline-success btn-md">
                            <i class="fas fa-check"></i>
                            Submit
                        </button>
                        <button type="button" class="btn btn-outline-danger btn-md cancelBtn" data-dismiss="modal">
                            <i class="fas fa-times"></i>
                            Cancel
                        </button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div> <!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <!-- End of Add Dialog -->

    <script type="text/javascript">
        $('#open_manage_rooms').addClass('menu-open');
        $('#rooms').addClass('active');

        $('#_room_type').change(() => {
            const selectedOption = $('#_room_type').find(':selected');
            $('#room_rate').val(selectedOption.attr('price'))
        });

        $(".cancelBtn").on('click', function() {
            $("#add_room input").val('');
            $("#add_room select").val('');
            $("#add_room file").val('');
            $("#add_room form")[0].reset();
        });

        $('#roomTypeSelect').change(function() {
            const selectedRoomType = $(this).val();

            if (selectedRoomType === 'all') {
                $('.room-item').show();
            } else {
                $('.room-item').hide();
                $('.room-item[data-roomtype="' + selectedRoomType + '"]').show();
            }
        });

        $(document).on('change', '.custom-file-input', function() {
            const file = $(this)[0].files[0];
            const formData = new FormData();
            const index = $(this).closest('.input-group').find('input[type="text"][name="room_image_hidden"]')
                .val();
            const label = $(this).next('.custom-file-label');

            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 1500
            });

            if (file && file.type.match('image.*')) {
                formData.append('image', file);
                label.text(file.name);

                $.ajax({
                    url: "{{ route('room_image') }}",
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data) {
                        if (data['response'] === 1) {
                            $(`#room_image${index}`).val(data['message']);
                        } else {
                            Toast.fire({
                                icon: 'error',
                                title: `<p class="text-center pt-2">${data['message']}</p>`
                            });
                        }
                    }
                });
            } else {
                Toast.fire({
                    icon: 'error',
                    title: '<p class="text-center pt-2">Please select an image file.</p>'
                });
                $(this).val('');
                label.text('Choose file');
            }
        });

        let count_click = 2;
        $('#add_upload_image').click(function() {
            var newInputBlock = `
        <div class="col-lg-12">
            <div class="form-group">
                <div class="input-group">
                    <div class="custom-file">
                        <input type="text" class="form-control" value="${count_click}" name="room_image_hidden" readonly hidden>
                        <input type="file" class="custom-file-input" id="exampleInputFile${count_click}">
                        <label class="custom-file-label" for="exampleInputFile${count_click}">Choose file</label>
                    </div>
                    <input type="text" class="form-control" name="room_image[]" id="room_image${count_click}" readonly hidden>
                </div>
            </div>
        </div>`;
            $('#upload_image_input').append(newInputBlock);
            count_click++;
        });
    </script>

    <script>
        $(function() {
            bsCustomFileInput.init();
        });
    </script>

    <style scoped>
        .divide_box {
            width: 100%;
            height: auto;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            flex-direction: row;
            align-content: center;
            gap: 10px;
        }

        .room-item {
            margin: 5px;
            background: linear-gradient(45deg, white, whitesmoke, grey);
            border: 2px solid #000;
            backdrop-filter: blur(10px);
            border-radius: 5px;

        }


        .img_fix_size {
            width: 300px;
            height: 330px;
            padding: 5px;
            display: block;
            object-fit: cover;
        }
    </style>
@endsection
