const checkbox = document.getElementById("checkbox")
checkbox.addEventListener("change", () => {
    const currentBackground = getComputedStyle(document.documentElement).getPropertyValue('--light').trim();

    
    if (currentBackground === '#fff') {
        document.documentElement.style.setProperty('--light', '#191c24');
        document.documentElement.style.setProperty('--dark', '#fff');
    } else {
        document.documentElement.style.setProperty('--light', '#fff');
        document.documentElement.style.setProperty('--dark', '#191c24');
    }
  
})