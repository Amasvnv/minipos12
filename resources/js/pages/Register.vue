<template>
    <div class=" d-flex justify-content-center">

   
   
   <div class="authentication-wrapper authentication-basic container-p-y col-md-4">
    <div class="authentication-inner">
      <!-- Register -->
      <div class="card">
        <div class="card-body">
          <!-- Logo -->
          <div class="app-brand justify-content-center">
            <a href="index.html" class="app-brand-link gap-2">
              <span class="app-brand-logo demo">



</span>
             
            </a>
          </div>
          <!-- /Logo -->
          <h4 class="mb-2">ລົງທະບຽນສະມາສິກໃຫ່ມ</h4>
          

          
            <div class="mb-3">
              <label for="email" class="form-label">ຊື່ຜຼ້ໃຊ້</label>
              <input type="text" class="form-control" placeholder="Username" v-model="user_name">
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">ອີເມວ</label>
              <input type="text" class="form-control" placeholder="Enter your Email or Username" v-model="email">
            </div>

    

            <div class="mb-3 form-password-toggle">
              <div class="d-flex justify-content-between">
                <label class="form-label" for="password">ລະຫັດຜ່ານ</label>
                <!-- <a href="auth-forgot-password-basic.html">
                  <small>Forgot Password?</small>
                </a> -->
              </div>
              <div class="input-group input-group-merge">
                <input type="password" class="form-control" name="password" placeholder="············" aria-describedby="password" v-model="password">
                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
              </div>
            </div> 
            <div class="mb-3 form-password-toggle">
              <div class="d-flex justify-content-between">
                <label class="form-label" for="password">ຢືນຍັນລະຫັດຜ່ານ</label>
                <!-- <a href="auth-forgot-password-basic.html">
                  <small>Forgot Password?</small>
                </a> -->
              </div>
              <div class="input-group input-group-merge">
                <input type="password" class="form-control" name="password" placeholder="············" aria-describedby="password" v-model="password2">
                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
              </div>
            </div>
            <!-- <div class="mb-3">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="remember-me">
                <label class="form-check-label" for="remember-me">
                  Remember Me
                </label>
              </div>
            </div> -->

            <div class="alert alert-warning" role="alert" v-if="show_error">
                {{ Text_error }}
             </div>

            <div class="mb-3">
              <button class="btn btn-primary d-grid w-100" @click="register()">ລົງທະບຽນ</button>
            </div>
         

          <p class="text-center">
            <span>ມີບັນຊີແລ້ວ? </span>
            <router-link to="/login">
              <span>ເຂົ້າສູ່ລະບົບ</span>
            </router-link>
          </p>
        </div>
      </div>
      <!-- /Register -->
    </div>
  </div>
  </div>
</template>

<script>

import axiox from 'axios';

export default {
    name: 'Minipos12Register',

    data() {
        return {
            user_name: '',
            email: '',
            password: '',
            password2: '',
            show_error: false,
            Text_error: ''
        };
    },

    mounted() {
        
    },

    methods: {
        register(){
          if(this.user_name == '' || this.email == '' || this.password == ''){
            this.show_error = true;
            this.Text_error = 'ກະລຸນາກວດສອບຂໍ້ມຸນໃຫ້ຄົບຖ້ວນ!'
          } else{
            if(this.password == this.password2){
              this.show_error = false;
              this.Text_error = ''
              // ກວດສອບຖືກຕ້ອງ

              axiox.post('api/register',{
                from_user_name: this.user_name,
                from_email: this.email,
                from_password: this.password
              }).then((res)=>{
                console.log(res);

                if(res.data.success){
                  this.show_error = false;
                  this.Text_error = ''

                  // ສຳສັ່ງລ້າງຂໍ້ຄວາມ

                  this.user_name = '';
                  this.email = '';
                  this.password = '';
                  this.password2 = '';

                  // ຄຳສັ່ງສຳເລັດແລ້ວໄປຫນ້າອື່ນ

                  this.$router.push('/login');

                } else {
                  this.show_error = true;
                  this.Text_error = res.data.message;
                }

              }).catch((err)=>{
                console.log(err);
              });


            } else{
              this.show_error = true;
              this.Text_error = 'ລະຫັດຜ່ານບໍ່ຄືກັນ!'
            }
            
          }
        },
    },
};
</script>

<style lang="scss" scoped>

</style>