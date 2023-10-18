const hostsales = document.getElementById('hostsales-amount')
const hostsalesSelect = document.getElementById('hostcheck')

const save = document.getElementById('save-inputs')
const saveSelect = document.getElementById('savecheck')

const staffmeal = document.getElementById('staffmeal-amount')
const staffmealSelect = document.getElementById('staffmealcheck')

const transfer = document.getElementById('transfer-amount')
const transferSelect = document.getElementById('transfercheck')


// Show/Hide Host Sales input box
hostsalesSelect.addEventListener('change', function() {
    if (this.checked) {
        hostsales.style.display = 'block';
    }
    else {
        hostsales.style.display = 'none';
    }
})

// Show/Hide Saved Stats Inputs
saveSelect.addEventListener('change', function() {
    if (this.checked) {
        save.style.display = 'block';
    }
    else {
        save.style.display = 'none';
    }
})

// Show/Hide Staff Meal input box
staffmealSelect.addEventListener('change', function() {
    if (this.checked) {
        staffmeal.style.display = 'block';
    }
    else {
        staffmeal.style.display = 'none';
    }
})

// Show/Hide Staff Meal input box
transferSelect.addEventListener('change', function() {
    if (this.checked) {
        transfer.style.display = 'block';
    }
    else {
        transfer.style.display = 'none';
    }
})


