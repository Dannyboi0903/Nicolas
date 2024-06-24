<!-- Bootstrap -->
<script src="../vendor/bootstrap.bundle.min.js"></script>

<script>

    closeNav = document.getElementById('closeNav')
    closeNav.onclick = (e) => {
        document.getElementById('mNav').classList.add('d-none')
    }

    openNav = document.getElementById('openNav')
    openNav.onclick = (e) => {
        document.getElementById('mNav').classList.remove('d-none')
    }
</script>



</body>

</html>