<script setup lang="ts">
import {ref} from "vue";

interface IForm {
  name: string,
  phone: string,
  message: string
}


const form = ref<IForm>({
  name: '',
  phone: '',
  message: ''
})

const errors = ref<Record<keyof IForm, boolean>>({
  name: false,
  phone: false,
  message: false
});

const successMessage = ref()
const errorMessage = ref()

const pingError = (): boolean => {
  errorMessage.value = ''
  successMessage.value = ''
  validateForm('name')
  validateForm('phone')
  validateForm('message')
  return Object.keys(errors.value).filter(key => errors.value[key as keyof IForm]).length === 0
}

const sendFeedback = async (): Promise<void> => {

  if (!pingError()){
    return
  }

  const result = await fetch('http://127.0.0.1:8000/api/feedback', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
      'Accept': 'application/json'
    },
    body: JSON.stringify(form.value)
  })

  const data = await result.json();

  if (!result.ok) {
     errorMessage.value = data.error.message
  }
  else {
    successMessage.value = 'Сообщение успешно отправлено';
  }

  clearData()
}

const clearData = () => {
  setTimeout(() => {
    successMessage.value = '';
    errorMessage.value = ''
    form.value = {
      name: '',
      phone: '',
      message: ''
    }
  },3000)
}

const validateForm = (key: keyof IForm): void => {
  errors.value[key] = form.value[key].length === 0
}

</script>

<template>
  <section class="pb-4">
    <div class="border rounded-5">
      <section class="w-100 p-4 d-flex justify-content-center pb-4">
        <form style="width: 26rem;">

          <!-- Name input -->
          <div data-mdb-input-init="" class="form-outline mb-4">
            <label class="form-label" for="name">Имя</label>
            <input
                v-model.trim="form.name"
                @input="validateForm('name')"
                :class="{'is-invalid': errors.name}"
                type="text"
                id="name"
                class="form-control"
            >
            <div
                :class=" errors.name ? 'invalid-feedback': 'd-none'">
              это обезателное поля
            </div>
          </div>

          <!-- Phone -->
          <div class="form-outline mb-4" data-mdb-input-initialized="true">
            <label class="form-label" for="phone">Телефон</label>
            <input
                v-model.trim="form.phone"
                @input="validateForm('phone')"
                :class="{'is-invalid': errors.phone}"
                type="tel"
                id="phone"
                class="form-control"
            >
            <div
                :class=" errors.phone ? 'invalid-feedback': 'd-none'">
              это обезателное поля
            </div>
          </div>

          <!-- Message input -->
          <div class="form-outline mb-4">
            <label class="form-label" for="message">Message</label>
            <textarea
                v-model.trim="form.message"
                @input="validateForm('message')"
                :class="{'is-invalid': errors.message}"
                class="form-control"
                id="message"
                rows="4"
            ></textarea>
            <div
                :class=" errors.message ? 'invalid-feedback': 'd-none'">
              это обезателное поля
            </div>
          </div>

          <!-- Submit button -->
          <button
              @click.prevent="sendFeedback"
              type="button"
              class="btn btn-primary btn-block mb-4 w-100"
          >Send</button>
          <div
              v-if="successMessage"
              class="alert alert-success" role="alert">
            {{ successMessage }}
          </div>
          <div
              v-if="errorMessage"
              class="alert alert-danger" role="alert">
            {{ errorMessage }}
          </div>
        </form>
      </section>
    </div>
  </section>
</template>
