<template>
    <div class="card">
        <h5 class="card-header">ລາຍການ ສະຕ໋ອກສິນຄ້າ</h5>
        <div class="card-body">
            <div></div>

            <div class="table-responsive text-nowrap">
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
        return {};
    },

    mounted() {},

    methods: {},
};
</script>

<style lang="scss" scoped></style>
