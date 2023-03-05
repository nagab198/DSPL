<script setup lang="ts">

const number = ref('');
const error = ref<string>('');
const resData = ref<any>('')
const toggles = ref();
const getValue = (e: string) => {
  number.value += e;
}
const callApi = async () => {
  console.log(number.value.toString().length)
  if (number.value.toString().length == 10) {
    const {data: res} = await useFetch<{ response: any }>(`${useRuntimeConfig().public.apiBaseUrl}/api/calling/${number.value}`);
    resData.value = res.value?.response;
    toggles.value.click();
  } else {
    error.value = "Number must be 10 digits";
  }
};
const clear = () => {
  number.value = number.value.slice(0, -1);
}
</script>

<template>
  <div>
    <div class="main">
      <div class="row h-70">
        <div class="col rounded-2 justify-content-center align-items-center d-flex  py-2  bg-white ">{{ number }}</div>

      </div>
      <span v-if="error" class="text-danger">{{ error }}</span>
      <div class="mx-3 my-2 row gap-3 ">
        <div class="col rounded-2 justify-content-center d-flex bg-black py-2" @click="getValue(1)">
          <div class="fw-bold display-6 text-white">1</div>
        </div>
        <div class="col justify-content-center flex-wrap align-items-center d-flex rounded-2 bg-black py-2"
             @click="getValue(2)">
          <div class="fw-bold display-6 text-white">2</div>
          <div class="small">ABC</div>
        </div>
        <div class="col justify-content-center flex-wrap align-items-center d-flex rounded-2 bg-black py-2"
             @click="getValue(3)">
          <div class="fw-bold display-6 text-white">3</div>
          <div class="small">DEF</div>
        </div>
      </div>
      <div class="mx-3  my-2 row gap-3">
        <div class="col  justify-content-center flex-wrap align-items-center d-flex rounded-2 py-2 bg-black"
             @click="getValue(4)">

          <div class="fw-bold display-6 text-white">4</div>
          <div class="small">GHI</div>
        </div>
        <div class="col justify-content-center align-items-center flex-wrap d-flex rounded-2 bg-black py-2"
             @click="getValue(5)">
          <div class="fw-bold display-6 text-white">5</div>
          <div class="small">JKL</div>
        </div>
        <div class="col justify-content-center align-items-center flex-wrap d-flex rounded-2 bg-black py-2"
             @click="getValue(6)">
          <div class="fw-bold display-6 text-white">6</div>
          <div class="small">MNO</div>
        </div>
      </div>
      <div class="mx-3 my-2 row gap-3">
        <div class="col justify-content-center flex-wrap align-items-center d-flex rounded-2 bg-black py-2"
             @click="getValue(7)">
          <div class="fw-bold display-6 text-white">7</div>
          <div class="small">PQRS</div>
        </div>
        <div class="col justify-content-center flex-wrap align-items-center d-flex rounded-2 bg-black py-2"
             @click="getValue(8)">
          <div class="fw-bold display-6 text-white">8</div>
          <div class="small">TUV</div>
        </div>
        <div class="col justify-content-center flex-wrap align-items-center d-flex rounded-2 bg-black py-2"
             @click="getValue(9)">
          <div class="fw-bold display-6 text-white">9</div>
          <div class="small">WXYZ</div>
        </div>
      </div>
      <div class="mx-3 h-auto my-2 row gap-3 ">
        <div class="col justify-content-center h-70 flex-wrap align-items-center d-flex rounded-2 bg-black py-2">
          <div class="fw-bold display-6  text-white">*</div>
        </div>
        <div class="col justify-content-center flex-wrap align-items-center d-flex rounded-2 bg-black py-2"
             @click="getValue(0)">
          <div class="fw-bold display-6 text-white">0</div>
        </div>
        <div class="col  justify-content-center flex-wrap align-items-center d-flex rounded-2 bg-black py-2">
          <div class="fw-bold display-6 text-white">#</div>
        </div>
      </div>
      <div class="row mx-3 my-2">
        <div @click="callApi" class="col-8"><i class="fa bg-success fa-dd fa-phone" aria-hidden="true"></i></div>
        <div @click="clear" class="col-4 "><i class=" fa-dd fa fa-times"></i></div>

      </div>

      <div class="modal fade " id="exampleModalToggle" aria-hidden="true"
           aria-labelledby="exampleModalToggleLabel" ref="props"
           tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalToggleLabel"> Calling</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              {{ resData }}
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">End</button>
            </div>
          </div>
        </div>
      </div>
      <button class="btn btn-primary d-none" ref="toggles" data-bs-toggle="modal" href="#exampleModalToggle"></button>
    </div>
  </div>
</template>
<style scoped>

.h-70 {
  height: 70px;
}

.fa-dd {
  font-size: 35px;
  padding: 7px 10px;
  border-radius: 100%;
  color: #FFFF;
}

.main {
  border-radius: 5px;
  background-color: #2f2e2e;
  width: 273px;
  padding: 20px;
  margin: 30px auto;
  text-align: center;
  box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22);
}

</style>
