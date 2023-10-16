const staffmeal = document.getElementById('staffmeal-amount')
const staffmealSelect = document.getElementById('staffmeal')

const saveInputs = document.getElementById('save-inputs')
const saveSelectYes = document.getElementById('save-select-yes')
const saveSelectNo = document.getElementById('save-select-no')

staffmealSelect.addEventListener('change', function() {
    if (this.checked) {
        staffmeal.style.display = 'block';
    }
    else {
        staffmeal.style.display = 'none';
    }
})

saveSelectNo.addEventListener('change', function() {
    if (this.checked) {
        saveInputs.style.display = 'none';
    }
})

saveSelectYes.addEventListener('change', function() {
    if (this.checked) {
        saveInputs.style.display = 'block';
    }
})