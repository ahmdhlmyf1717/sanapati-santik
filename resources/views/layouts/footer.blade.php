<div class="footer">
    <p>&copy; 2024 SANTIK. All Rights Reserved.</p>
</div>

<button id="scrollToTop" class="scroll-to-top">
    <i class="bi bi-arrow-up-circle"></i>
</button>

<style>
    .scroll-to-top {
        position: fixed;
        bottom: 20px;
        right: 20px;
        background-color: #75b8ff;
        color: white;
        border: none;
        border-radius: 20%;
        padding: 10px;
        font-size: 24px;
        cursor: pointer;
        display: none;
        transition: background-color 0.3s;

    }

    .scroll-to-top:hover {
        background-color: #0056b3;

    }
</style>

<script>
    const scrollToTopBtn = document.getElementById("scrollToTop");


    window.onscroll = function() {
        if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
            scrollToTopBtn.style.display = "block"; // 
        } else {
            scrollToTopBtn.style.display = "none"; // 
        }
    };


    scrollToTopBtn.onclick = function() {
        window.scrollTo({
            top: 0,
            behavior: "smooth"
        });
    };
</script>
