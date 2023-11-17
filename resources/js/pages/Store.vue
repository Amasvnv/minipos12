<template>
    <div class="card">
        <h5 class="card-header">ລາຍການ ສະຕ໋ອກສິນຄ້າ</h5>

        <div class="card-body">
            <div v-if="showfrom">
                <div class="d-flex justify-content-end">
                    <button
                        type="button"
                        class="btn rounded-pill btn-success me-2"
                        :disabled="CheckForm"
                    >
                        <i class="bx bxs-save fs-5 me-2"></i>ບັນທຶກ
                    </button>
                    <button
                        type="button"
                        class="btn rounded-pill btn-warning"
                        @click="CancelStore()"
                    >
                        <i class="bx bxs-x-circle fs-5 me-2"></i>ຍົກເລີກ
                    </button>
                </div>

                <div class="row">
                    <div class="col-md-4">image</div>
                    <div class="col-md-8">
                        {{ FormStore }}

                        <label class="form-label fs-6 mb-2"
                            >ບາໂຄ້ດ: <span class="text-danger">*</span>
                        </label>

                        <div class="input-group input-group-merge mb-2">
                            <span
                                class="input-group-text"
                                id="basic-addon-search31"
                                ><i class="bx bx-qr-scan"></i
                            ></span>
                            <input
                                type="text"
                                class="form-control"
                                placeholder="ສະແກນບາໂຄ້ດລະຫັດສິນຄ້າ..."
                                aria-label="Search..."
                                aria-describedby="basic-addon-search31"
                            />
                        </div>

                        <label class="form-label fs-6"
                            >ຊື່ສິນຄ້າ:
                            <span class="text-danger">*</span> </label
                        ><input
                            type="text"
                            class="form-control fs-5 mb-2"
                            placeholder="ຊື່ສິນຄ້າ..."
                            v-model="FormStore.name"
                        />
                        <label class="form-label fs-6">
                            ຈຳນວນ:
                            <span class="text-danger">*</span></label
                        ><input
                            type="text"
                            class="form-control fs-5 mb-2"
                            placeholder="ຈຳນວນ..."
                            v-model="FormStore.amount"
                        />

                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-label fs-6"
                                    >ລາຄາຊື້:
                                    <span class="text-danger">*</span></label
                                >

                                <div class="input-group mb-2">
                                    <input
                                        type="text"
                                        class="form-control"
                                        placeholder="ລາຄາຊື້..."
                                        v-model="FormStore.price_buy"
                                    />
                                    <span class="input-group-text">ກີບ</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fs-6"
                                    >ລາຄາຂາຍ:
                                    <span class="text-danger">*</span></label
                                >
                                <div class="input-group mb-2">
                                    <input
                                        type="text"
                                        class="form-control"
                                        placeholder="ລາຄາຂາຍ..."
                                        v-model="FormStore.price_sell"
                                    />
                                    <span class="input-group-text">ກີບ</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="table-responsive text-nowrap" v-if="!showfrom">
                <div class="d-flex justify-content-between mb-2">
                    <div class="d-flex align-items-center">
                        <div class="me-2">
                            <i class="bx bx-sort fs-4"></i>
                        </div>
                        <select
                            class="form-select"
                            v-model="PerPage"
                            @change="GetStore()"
                        >
                            <option value="5">5</option>
                            <option value="10">10</option>
                            <option value="20">20</option>
                            <option value="30">30</option>
                        </select>
                    </div>

                    <div class="d-flex">
                        <div class="input-group input-group-merge">
                            <span
                                class="input-group-text"
                                id="basic-addon-search31"
                                ><i class="bx bx-search"></i
                            ></span>
                            <input
                                type="text"
                                class="form-control me-2"
                                placeholder="ຄົ້ນຫາຂໍ້ມູນ..."
                                aria-label="Search..."
                                aria-describedby="basic-addon-search31"
                            />
                        </div>

                        <button
                            type="button"
                            class="btn rounded-pill btn-primary"
                            @click="AddStore()"
                        >
                            <i class="bx bxs-shield-plus me-2 fs-5"></i
                            >ເພື່ມຂໍ້ມູນ
                        </button>
                    </div>
                </div>

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <!-- <th class="fs-6">ຊື່ສິນຄ້າ</th> -->
                            <th>ຊື່ສິນຄ້າ</th>
                            <th>ລາຄາຊື້</th>
                            <th>ຈຳນວນ</th>
                            <th>ຈັດການລົບ-ແກ້ໄຂ</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        <tr>
                            <td>1</td>
                            <td>2</td>
                            <td>3</td>
                            <td>4</td>
                            <td>5</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Minipos12Store",

    data() {
        return {
            showfrom: false,

            FormStore: {
                name: "",
                image: "",
                amount: "",
                price_buy: "",
                price_sell: "",
            },
            formType:true,
        };
    },

    computed: {
        CheckForm() {
            if (
                this.FormStore.name == "" ||
                this.FormStore.amount == "" ||
                this.FormStore.price_buy == "" ||
                this.FormStore.price_sell == ""
            ) {
                return true;
            } else {
                return false;
            }
        },
    },

    mounted() {},

    methods: {
        AddStore() {
            this.showfrom = true;
            this.FormStore.name = "";
            this.FormStore.amount = "";
            this.FormStore.price_buy = "";
            this.FormStore.price_sell = "";
            this.FormStore.image = "";
            this.image_pre = window.location.origin + '/assets/img/img.jpg';
            this.ShowForm = true;
            this.FormType = true;
        },

        CancelStore() {
            this.showfrom = false;
        },

        // test

        SaveStore(){

            this.post_loading = true;

            if(this.FormType){
                // ເພີ່ມຂໍ້ມູນ

                axios.post('api/store/add', this.FormStore,{ headers:{ "content-type":"multipart/form-data", Authorization: 'Bearer '+ this.store.get_token}}).then((res)=>{
                    // console.log(res);
                    if(res.data.success){
                        this.ShowForm = false;
                        this.GetStore();

                        this.$swal({
                        toast:true,
                        position: 'top-end',
                        icon: 'success',
                        title: res.data.message,
                        showConfirmButton: false,
                        timer: 2500
                        });


                    } else {

                        this.$swal({
                        icon: 'error',
                        title: 'ບໍ່ສຳເລັດ',
                        text: res.data.message,
                        showConfirmButton: false,
                        timer: 3500
                        });

                    }
              
                    this.post_loading = false;

                }).catch((error)=>{
                    console.log(error);
                    this.post_loading = false;
                    if(error){
                        if(error.response.status == 401){
                            this.store.remove_token();
                            this.store.remove_user();
                            localStorage.removeItem('web_token');
                            localStorage.removeItem('web_user');
                            this.$router.push('/login')
                        }
                    }
                })

            } else {
                // ອັບເດດຂໍ້ມູນ

                axios.post(`api/store/update/${this.EditId}`, this.FormStore,{ headers:{ "content-type":"multipart/form-data", Authorization: 'Bearer '+ this.store.get_token}}).then((res)=>{
                    // console.log(res);
                    if(res.data.success){
                        this.ShowForm = false;
                        this.GetStore();

                        this.$swal({
                        toast:true,
                        position: 'top-end',
                        icon: 'success',
                        title: res.data.message,
                        showConfirmButton: false,
                        timer: 2500
                        });

                    } else {
                        this.$swal({
                        icon: 'error',
                        title: 'ບໍ່ສຳເລັດ',
                        text: res.data.message,
                        showConfirmButton: false,
                        timer: 3500
                        });
                    }

                    this.post_loading = false;

                }).catch((error)=>{
                    console.log(error);
                    this.post_loading = false;
                    if(error){
                        if(error.response.status == 401){
                            this.store.remove_token();
                            this.store.remove_user();
                            localStorage.removeItem('web_token');
                            localStorage.removeItem('web_user');
                            this.$router.push('/login')
                        }
                    }
                })

            }
        },

        // test

    },
};
</script>

<style lang="scss" scoped></style>
