const tabArray = Array.from(document.querySelectorAll('.nav-link'));
const contentArray = Array.from(document.querySelectorAll('.tab-panel'));

tabArray.forEach(tab => {
    tab.addEventListener('click', function () {
        target = tab;
        tabArray.forEach(t => {
            t.classList.remove('border-orange-600');
        });

        target.classList.add('border-orange-600');

        const currentTab = tabArray.indexOf(target);

        contentArray.forEach(content => {
            if(contentArray.indexOf(content) === currentTab) {
                content.classList.remove('hidden');
            } else if(contentArray.indexOf(content) !== currentTab) {
                content.classList.add('hidden');
            }
        });

        target.classList.add('active');
    });
});