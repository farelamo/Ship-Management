@php 
    use Carbon\Carbon; 
@endphp

<footer class="main-footer">
    <div class="footer-left">
        Copyright &copy; {{ Carbon::now()->format('Y'); }} <div class="bullet"></div> 
        Design By <a href="">SSMS</a>
    </div>
    <div class="footer-right">
        1.0.0
    </div>
</footer>
