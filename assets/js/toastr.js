toastr.options = {
    closeButton: true,
    positionClass: "toast-top-right",
    showDuration: "300", // ফেইড ইন হওয়ার সময় (মিলিসেকেন্ডে)
    hideDuration: "1000", // ফেইড আউট হওয়ার সময় (মিলিসেকেন্ডে)
    timeOut: "2000", // টোস্ট প্রদর্শনের সময় (মিলিসেকেন্ডে)
    extendedTimeOut: "1000",
    showEasing: "swing",
    hideEasing: "linear",
    showMethod: "fadeIn", // ফেইড ইন ইফেক্ট
    hideMethod: "fadeOut" // ফেইড আউট ইফেক্ট
};


       //delete show 
        if (localStorage.getItem('delete_msg')) {
            toastr.success('Users deleted successfully');
            localStorage.removeItem('delete_msg');        
        }
 
        //update show
        if (localStorage.getItem('update_msg')) {
            toastr.success('Users update successfully');
            localStorage.removeItem('update_msg');        
        }
        //data insert
        if (localStorage.getItem('data_insert')) {
            toastr.success('Users insert successfully');
            localStorage.removeItem('data_insert');        
        }