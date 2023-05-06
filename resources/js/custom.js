const themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
const themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');

const themeToggleBtn = document.getElementById('theme-toggle');

if (localStorage.getItem('theme') === 'dark') {
    themeToggleLightIcon.classList.remove('hidden');
    document.body.classList.add('dark');
} else {
    themeToggleDarkIcon.classList.remove('hidden');
    document.body.classList.remove('dark');
}

themeToggleBtn.addEventListener('click', function() {
    themeToggleDarkIcon.classList.toggle('hidden');
    themeToggleLightIcon.classList.toggle('hidden');

    if (document.body.classList.contains('dark')) {
        document.body.classList.remove('dark');
        localStorage.setItem('theme', 'light');
    } else {
        document.body.classList.add('dark');
        localStorage.setItem('theme', 'dark');
    }
});
