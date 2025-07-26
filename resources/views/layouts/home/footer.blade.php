<!-- Footer -->
<footer class="bg-indigo-950 text-white pt-12 relative z-10">
    <div class="max-w-7xl mx-auto px-6 sm:px-12">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8 pb-12 border-b border-indigo-800">
            
            <!-- برند و توضیح کوتاه -->
            <div>
                <h3 class="text-2xl font-bold text-white mb-3">سِروینو</h3>
                <p class="text-sm text-indigo-300 leading-relaxed">
                    پلتفرم نوبت‌دهی هوشمند برای تعمیرکاران و مشتریان خودرو. ساده، سریع و قابل اعتماد.
                </p>
            </div>

            
            <div>
                <h4 class="text-lg font-semibold mb-4">دسترسی سریع</h4>
                <ul class="space-y-3 text-indigo-300 text-sm">
                    <li><button onclick="openModal('aboutModal')" class="hover:text-white transition">درباره ما</button></li>
                    <li><button onclick="openModal('faqModal')" class="hover:text-white transition">سوالات متداول</button></li>
                    <li><button onclick="openModal('guideModal')" class="hover:text-white transition">راهنمای استفاده</button></li>
                </ul>
            </div>

           
            <div>
                <h4 class="text-lg font-semibold mb-4">ارتباط با ما</h4>
                <ul class="text-sm text-indigo-300 space-y-3">
                    <li class="flex items-center gap-2"><i class="fas fa-phone text-indigo-400"></i> ۰۹۳۸۱۲۳۴۵۶۷</li>
                    <li class="flex items-center gap-2"><i class="fas fa-envelope text-indigo-400"></i> serv.support@gmail.com</li>
                    <li class="flex items-center gap-2"><i class="fas fa-map-marker-alt text-indigo-400"></i> ایران، دزفول </li>
                </ul>
            </div>

            
            <div>
                <h4 class="text-lg font-semibold mb-4">دنبال کنید</h4>
                <div class="flex gap-4 text-indigo-300">
                    <a href="#" class="hover:text-white transition"><i class="fab fa-telegram fa-xl"></i></a>
                    <a href="#" class="hover:text-white transition"><i class="fab fa-instagram fa-xl"></i></a>
                    <a href="#" class="hover:text-white transition"><i class="fab fa-twitter fa-xl"></i></a>
                    <a href="#" class="hover:text-white transition"><i class="fab fa-linkedin fa-xl"></i></a>
                </div>
            </div>

        </div>

        <!-- کپی‌رایت -->
        <div class="text-center text-sm text-indigo-400 py-6">
            © 2025 تمام حقوق محفوظ است | توسعه یافته توسط <span class="text-white font-semibold">AmirrezaHKM</span>
        </div>
    </div>
</footer>

<!-- Modals -->
<div id="aboutModal" class="modal hidden">
    <div class="modal-content">
        <h2 class="text-lg font-semibold mb-4">درباره ما</h2>
        <p class="text-sm text-gray-300">ما با هدف ساده‌سازی فرآیند نوبت‌دهی بین تعمیرکاران و مشتریان خودرو، این پلتفرم را توسعه دادیم.</p>
        <button class="modal-close" onclick="closeModal('aboutModal')">بستن</button>
    </div>
</div>

<div id="contactModal" class="modal hidden">
    <div class="modal-content">
        <h2 class="text-lg font-semibold mb-4">تماس با ما</h2>
        <p class="text-sm text-gray-300">برای ارتباط با ما با ایمیل support@example.com یا شماره ۰۹۳۸۱۲۳۴۵۶۷ تماس بگیرید.</p>
        <button class="modal-close" onclick="closeModal('contactModal')">بستن</button>
    </div>
</div>

<div id="faqModal" class="modal hidden">
    <div class="modal-content">
        <h2 class="text-lg font-semibold mb-4">سوالات متداول</h2>
        <p class="text-sm text-gray-300">چطور نوبت بگیرم؟ به راحتی پس از ورود، تعمیرکار مدنظر را انتخاب کرده و زمان مناسب را ثبت کنید.</p>
        <button class="modal-close" onclick="closeModal('faqModal')">بستن</button>
    </div>
</div>

<div id="guideModal" class="modal hidden">
    <div class="modal-content">
        <h2 class="text-lg font-semibold mb-4">راهنمای استفاده</h2>
        <p class="text-sm text-gray-300">برای استفاده از سیستم، ابتدا ثبت‌نام کنید، وارد شوید و نوبت دلخواهتان را رزرو کنید.</p>
        <button class="modal-close" onclick="closeModal('guideModal')">بستن</button>
    </div>
</div>

<!-- Styles for modals -->
<style>
    .modal {
        position: fixed;
        inset: 0;
        background: rgba(0, 0, 0, 0.7);
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 50;
    }

    .modal-content {
        background: #1e1e2f;
        padding: 2rem;
        border-radius: 0.5rem;
        width: 90%;
        max-width: 500px;
        color: white;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.5);
    }

    .modal-close {
        margin-top: 1rem;
        background: #4f46e5;
        padding: 0.5rem 1rem;
        border-radius: 0.25rem;
        font-size: 0.875rem;
        transition: background 0.3s;
    }

    .modal-close:hover {
        background: #3730a3;
    }

    .hidden {
        display: none;
    }
</style>

<!-- JS for modal -->
<script>
    function openModal(id) {
        document.getElementById(id).classList.remove('hidden');
    }

    function closeModal(id) {
        document.getElementById(id).classList.add('hidden');
    }
</script>
