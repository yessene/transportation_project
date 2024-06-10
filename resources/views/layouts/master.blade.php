<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title></title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ URL::to('assets/img/apple-touch-icon.png') }}">
    <link rel="stylesheet" href="{{ URL::to('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::to('assets/plugins/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ URL::to('assets/plugins/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ URL::to('assets/css/feathericon.min.css') }}">
    <link rel="stylesheet" href="https://cdn.oesmith.co.uk/morris-0.5.1.css">
    <link rel="stylesheet" href="{{ URL::to('assets/plugins/morris/morris.css') }}">
    <link rel="stylesheet" href="{{ URL::to('assets/css/style.css') }}">
</head>
<link rel="stylesheet" type="text/css" href="{{ URL::to('assets/css/bootstrap-datetimepicker.min.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.0/dropzone.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.css">
{{-- for buttons --}}
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.css" rel="stylesheet">




<style>
    .column-search-input {
        width: 80px;
        /* Adjust as necessary */
    }
</style>



{{-- message toastr --}}
<link rel="stylesheet" href="{{ URL::to('assets/css/toastr.min.css') }}">
<script src="{{ URL::to('assets/js/toastr.min.js') }}"></script>
<script src="{{ URL::to('assets/js/toastr.min.js') }}"></script>


<body>
    <div class="main-wrapper">
        <div class="header">
            <div class="header-left">
                <a href="index.html" class="logo"> <img src="{{ URL::to('assets/img/hotel_logo.png') }}"
                        width="50" height="70" alt="logo"> <span class="logoclass"></span> </a>
                <a href="index.html" class="logo logo-small"> <img src="{{ URL::to('assets/img/hotel_logo.png') }}"
                        alt="Logo" width="30" height="30"> </a>
            </div>
            <a href="javascript:void(0);" id="toggle_btn"> <i class="fe fe-text-align-left"></i> </a>
            <a class="mobile_btn" id="mobile_btn"> <i class="fas fa-bars"></i> </a>
            <ul class="nav user-menu">
                <li class="nav-item dropdown noti-dropdown">
                    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                        <i class="fe fe-bell"></i>
                        <span class="badge badge-pill">{{ count($expiredvehicles) + count($arrivedtravels) }}</span>
                    </a>
                    <div class="dropdown-menu notifications">
                        <div class="topnav-dropdown-header">
                            <span class="notification-title">Notifications</span>
                            <a href="javascript:void(0)" class="clear-noti"> Clear All </a>
                        </div>
                        <div class="noti-content">
                            <ul class="notification-list">
                                @foreach ($expiredvehicles as $vehicle)
                                    <li class="notification-message">
                                        <a href="#">
                                            <div class="media">
                                                <div class="media-body">
                                                    <p class="noti-details">
                                                        the vehicle {{ $vehicle->registration_number }} has passed its validity date!
                                                    </p>
                                                    <p class="noti-time">
                                                        <span class="notification-time">
                                                            {{ \Carbon\Carbon::createFromFormat('d/m/Y', $vehicle->validite_date)->startOfDay()->diffForHumans(null, true) }}
                                                        </span>                                                    </p>
                                                    
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                @endforeach
                                @foreach ($arrivedtravels as $travel)
    <li class="notification-message">
        <a href="#">
            <div class="media">
                <div class="media-body">
                    <p class="noti-details">
                        the travel {{ $travel->id }} has arrived to its destination .
                    </p>
                    <p class="noti-time">
                        <span class="notification-time">
                            {{ \Carbon\Carbon::createFromFormat('d/m/Y', $travel->date_arrivee)->startOfDay()->diffForHumans(null, true) }}
                        </span>
                    </p>
                    
                </div>
            </div>
        </a>
    </li>
@endforeach
                            </ul>
                        </div>
                        <div class="topnav-dropdown-footer">
                            <a href="#">View all Notifications</a>
                        </div>
                    </div>
                </li>
                
                
                <li class="nav-item dropdown has-arrow">
                    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown"> <span
                            class="user-img"><img class="rounded-circle"
                                src="{{ URL::to('assets/img/profiles/avatar-01.png') }}" width="100"
                                alt="Soeng Souy"></span> </a>
                    <div class="dropdown-menu">
                        <div class="user-header">
                            <div class="avatar avatar-sm"> </div>
                            <div class="user-text">
                                <h6> {{ Auth::user()->name }}</h6>
                                <p class="text-muted mb-0"> {{ Auth::user()->role}}</p>
                            </div>
                        </div>
                        {{-- <a class="dropdown-item" href="{{ route('profile') }}">My Profile</a>  --}}
                        {{-- <a class="dropdown-item" href="settings.html">Account Settings</a>  --}}
                        <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
                    </div>
                </li>
            </ul>
            <div class="top-nav-search">
                <form>
                    <input type="text" class="form-control" placeholder="Search here">
                    <button class="btn" type="submit"><i class="fas fa-search"></i></button>
                </form>
            </div>
        </div>
        <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>
                        <li class=""> <a href="{{ route('home') }}"><i class="fas fa-tachometer-alt"></i>
                                <span>Dashboard</span></a> </li>
                        <li class="list-divider"></li>

                        <li class="vehicle-submenu">
                            <a href="{{ route('form/allvehicles/page') }}"><i class="fas fa-car"></i> <span>
                                    vehicles </span></a>
                        </li>
                        <li class="driver-submenu">
                            <a href="{{ route('form/alldrivers/page') }}"><i class="fas fa-user-tie"></i> <span>
                                    drivers </span></a>
                        </li>
                        <li class="client-submenu">
                            <a href="{{ route('form/allclients/page') }}"><i class="fas fa-address-card"></i> <span>
                                    Clients </span></a>
                        </li>
                        
                        <li class="travel-submenu">
                            <a href="{{ route('form/alltravels/page') }}"><i class="fas fa-truck"></i> <span> travels
                                </span></a>
                        </li>


                    </ul>
                </div>
            </div>
        </div>
        @yield('content')
    </div>
    <script data-cfasync="false" src="../../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="{{ URL::to('assets/js/jquery-3.5.1.min.js') }}"></script>

    <script src="{{ URL::to('assets/js/popper.min.js') }}"></script>
    <script src="{{ URL::to('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::to('assets/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ URL::to('assets/plugins/raphael/raphael.min.js') }}"></script>
    <script src="{{ URL::to('assets/js/moment.min.js') }}"></script>
    <script src="{{ URL::to('assets/js/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ URL::to('assets/js/script.js') }}"></script>
    <script src="{{ URL::to('assets/plugins/morris/morris.min.js') }}"></script>
    <script src="{{ URL::to('assets/js/chart.morris.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elements = document.querySelectorAll('#vehicles_select');
            elements.forEach(function(element) {
                new Choices(element, {
                    removeItemButton: true,
                    searchEnabled: true
                });
            });
        });
    </script>


    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function() {
            var table = $('.datatable').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print',
                    {
                        extend: 'colvis',
                        collectionLayout: 'fixed two-column'
                    }
                ]
            });

            // Setup - add a small text input to each footer cell
            $('.datatable thead tr').clone(true).appendTo('.datatable thead');
            $('.datatable thead tr:eq(1) th').each(function(i) {
                $(this).html('<input class="column-search-input" type="text" placeholder="Search" />');

                $('input', this).on('keyup change', function() {
                    if (table.column(i).search() !== this.value) {
                        table
                            .column(i)
                            .search(this.value)
                            .draw();
                    }
                });
            });

            // Toggle visibility of search input when column visibility changes
            table.on('column-visibility', function(e, settings, column, state) {
                // If column is made invisible
                if (!state) {
                    // Hide search input
                    $('.datatable thead tr:eq(1) th').eq(column).find('input').hide();
                } else {
                    // Else, show search input
                    $('.datatable thead tr:eq(1) th').eq(column).find('input').show();
                }
            });
        });
    </script>

    <!-- DataTables Buttons extension JS -->
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>

    <!-- JSZip (for Excel export) -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

    <!-- PDFMake (for PDF export) -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>

    <!-- Additional Buttons extension scripts for HTML5 export and print functionality -->
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.colVis.min.js"></script>


    <script>
        $(document).ready(function() {
            $('.custom-file-input').on("change", function() {
                var fileName = $(this).val().split("\\").pop();
                $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
            });
        });
    </script>

    <script>
        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('preview-image');
                output.src = reader.result;
                document.getElementById('preview-container').style.display = "block";
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.js"></script>
<script>
    Dropzone.options.dropzoneFileUpload = {
    url: '{{ route('file.upload') }}',
    acceptedFiles: 'application/pdf',
    headers: {
        'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    init: function() {
        this.on('addedfile', function(file) {
            // Do something when a file is added.
        });
        this.on('success', function(file, response) {
            // Do something after a successful upload.
        });
    }
};
    </script>

<script>
    document.getElementById('registrationForm').addEventListener('submit', function(event) {
        var password = document.getElementById('password').value;
        var confirmPassword = document.getElementById('password_confirmation').value;

        // Check if password meets validation conditions
        if (password.length < 8) {
            showAlert('Password must be at least 8 characters long.', 'red');
                        event.preventDefault(); // Prevent form submission
            return;
        }

        // Check if password and confirm password match
        if (password !== confirmPassword) {
            showAlert('Password and Confirm Password must match.',"red");
            event.preventDefault(); // Prevent form submission
            return;
        }
    });

    function showAlert(message, color) {
        var alertBox = document.createElement('div');
        alertBox.style.backgroundColor = color; // Set background color
        alertBox.style.color =#F6F4F3; // Set text color
        alertBox.style.padding = '10px';
        alertBox.style.marginBottom = '10px';
        alertBox.style.borderRadius = '5px';
        alertBox.textContent = message;
        document.body.appendChild(alertBox);

        setTimeout(function() {
            alertBox.style.display = 'none';
        }, 3000); // Hide alert after 3 seconds
    }
</script>

    @yield('script')

</body>

</html>
