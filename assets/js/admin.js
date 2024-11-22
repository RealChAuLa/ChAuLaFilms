function clickItem () {
    const navButtons = document.querySelectorAll('.nav-button');
    const contents = document.querySelectorAll('.content');
    
    navButtons.forEach(button => {
        button.addEventListener('click', () => {
            const target = button.getAttribute('data-target');
            contents.forEach(content => {
                if (content.id === target) {
                    content.classList.add('active'); // Add 'active' class to display
                } else {
                    content.classList.remove('active'); // Remove 'active' class to hide
                }
            });
        });
    });
    
}