<footer class="footer">
    <div class="d-sm-flex justify-content-center justify-content-sm-between">
        <span class="text-center text-muted text-sm-left d-block d-sm-inline-block">Copyright © <a
                href="https://www.bootstrapdash.com/" target="_blank">bootstrapdash.com </a>2021</span>
        <span class="float-none mt-1 text-center float-sm-right d-block mt-sm-0">Only the best <a
                href="https://www.bootstrapdash.com/" target="_blank"> Bootstrap dashboard </a> templates</span>
    </div>
</footer>
<!-- partial -->
</div>
<!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->

<!-- plugins:js -->
<script src="{{ asset('admin/vendors') }}/base/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- Plugin js for this page-->
<script src="{{ asset('admin/vendors') }}/chart.js/Chart.min.js"></script>
<script src="{{ asset('admin/vendors') }}/datatables.net/jquery.dataTables.js"></script>
<script src="{{ asset('admin/vendors') }}/datatables.net-bs4/dataTables.bootstrap4.js"></script>
<!-- End plugin js for this page-->
<!-- inject:js -->
<script src="{{ asset('admin/js') }}/off-canvas.js"></script>
<script src="{{ asset('admin/js') }}/hoverable-collapse.js"></script>
<script src="{{ asset('admin/js') }}/template.js"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="{{ asset('admin/js') }}/dashboard.js"></script>
<script src="{{ asset('admin/js') }}/data-table.js"></script>
<script src="{{ asset('admin/js') }}/jquery.dataTables.js"></script>
<script src="{{ asset('admin/js') }}/dataTables.bootstrap4.js"></script>
<!-- End custom js for this page-->
@stack('script')
<script src="{{ asset('admin/js') }}/jquery.cookie.js" type="text/javascript"></script>
<!-- livewire js links-->
@livewireScripts
</body>

</html>
