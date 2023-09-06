    </div>
    </div>
    <!--   Core JS Files   -->
    <script src="{{ url('user_assets/js/core/jquery.min.js') }}"></script>
    <script src="{{ url('user_assets/js/core/popper.min.js') }}"></script>
    <script src="{{ url('user_assets/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ url('user_assets/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
    <script src="https://kit.fontawesome.com/f5a5bc4a23.js" crossorigin="anonymous"></script>
    <!--  Google Maps Plugin    -->
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
    <!-- Chart JS -->
    <script src="{{ url('user_assets/js/plugins/chartjs.min.js') }}"></script>
    <!--  Notifications Plugin    -->
    <script src="{{ url('user_assets/js/plugins/bootstrap-notify.js') }}"></script>
    <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ url('user_assets/js/now-ui-dashboard.min.js?v=1.5.0') }}" type="text/javascript"></script><!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
    </script>
    <script src="{{ url('user_assets/demo/demo.js') }}"></script>
    <script>
        $(document).ready(function() {
            // Javascript method's body can be found in user_assets/js/demos.js
            demo.initDashboardPageCharts();

        });
    </script>
    <script>
        function secretkey() {
            var skbtn = document.getElementById('skbtn');
            var skinp = document.getElementById('skinp');
            skinp.select();
            skinp.setSelectionRange(0, 99999);
            navigator.clipboard.writeText(skinp.value);
            skbtn.innerHTML = "<i class='now-ui-icons ui-1_check' ></i>";
        }
    </script>
