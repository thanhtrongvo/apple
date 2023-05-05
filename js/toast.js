function toast({
    title='',
    message='',
    type='',
    duration=''
}) {
    const main = document.getElementById('toast');
    
    if(main){
        const toast = document.createElement('div');
        // auto remove toast
        const autoRemoveId = setTimeout(function(){
            main.removeChild(toast);
        },duration + 1000);
        // remove toast when click
        toast.onclick = function(e){
            if(e.target.closest('.toast__close')){
                main.removeChild(toast);
                clearTimeout(autoRemoveId);
            }
        }

        const icons ={
            success:'bx bxs-check-circle',
            info:'bx bxs-info-circle',
            warning:'bx bxs-error',
            error:'bx bxs-error-circle',
        };
        const icon = icons[type];
        const delay = (duration/1000).toFixed(2);

        toast.classList.add('toast',`toast--${type}`);   
        toast.style.animation=`slideInleft ease .5s, fadeOut linear 1s ${delay}s forwards`;
        toast.innerHTML = `
            <div class="toast__icon">
                <i class="${icon}"></i>
            </div>
            <div class="toast__body">
                <h3 class="toast__title">${title}</h3>
                <p class="toast__msg">${message}</p>
            </div>
            <div class="toast__close">
                <i class='bx bx-x'></i>
            </div>
        `;
        main.appendChild(toast);

        
    }
    
}


function showSuccessToast(){
    toast({
        title: 'Success',
        message: 'Thêm vào giỏ hàng thành công',
        type: 'success',
        duration: 5000
    })
}

function showInfoToast(){
    toast({
        title: 'Info',
        message: 'Cần thêm thông tin',
        type: 'info',
        duration: 5000
    })
}

function showWarningToast(){
    toast({
        title: 'Warning',
        message: 'Cảnh báo có gì đó không ổn',
        type: 'warning',
        duration: 5000
    })
}

function showErrorToast(){
    toast({
        title: 'Error',
        message: 'Thêm vào giỏ hàng không thành công',
        type: 'error',
        duration: 5000
    })
}
