    </div> <!-- Close container div from header -->
    
    <footer class="bg-gray-800 text-white py-6 mt-10">
        <div class="container mx-auto px-4">
            <div class="text-center">
                <p>&copy; <?= date('Y') ?> <a href="https://codehafeez.com/" target="_blank">CodeHafeez</a>. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script src="<?= base_url('public/js/scripts.js') ?>"></script>
    <script>
        // Auto-dismiss flash messages after 5 seconds
        document.addEventListener('DOMContentLoaded', function() {
            const flashMessages = document.querySelectorAll('.flash-message');
            flashMessages.forEach(message => {
                setTimeout(() => {
                    message.style.opacity = '0';
                    setTimeout(() => message.remove(), 500);
                }, 5000);
            });
        });
    </script>
</body>
</html>