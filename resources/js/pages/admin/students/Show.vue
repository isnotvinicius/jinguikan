<script setup>
import { ref } from "vue";
import { router } from "@inertiajs/vue3";
import Layout from "@/layouts/AppLayout.vue";
import { displayToast } from '@/components/ui/Toast';

const props = defineProps({
  student: Object,
  belts: Array,
});

const form = ref({
  name: props.student.name,
  birth_date: props.student.birth_date,
  belt_id: props.student.belt_id,
});

const submit = () => {
  router.put(`/admin/students/${props.student.id}`, form.value, {
    onSuccess: () => displayToast("Aluno atualizado com sucesso!")
  });
};
</script>

<template>
  <Layout>
    <div class="p-4">
      <h1 class="text-xl font-bold mb-4">Editar Aluno</h1>

      <form @submit.prevent="submit" class="mb-4">
        <div class="flex gap-4">
          <div class="flex-1">
            <label for="name" class="block text-sm font-medium text-gray-700">Nome</label>
            <input
              id="name"
              v-model="form.name"
              type="text"
              placeholder="Nome"
              class="border p-2 w-full"
              required
            />
          </div>

          <div class="flex-1">
            <label for="birth_date" class="block text-sm font-medium text-gray-700">Data de Nascimento</label>
            <input
              id="birth_date"
              v-model="form.birth_date"
              type="date"
              class="border p-2 w-full"
            />
          </div>

          <div class="flex-1">
            <label for="belt_id" class="block text-sm font-medium text-gray-700">Faixa</label>
            <select
              id="belt_id"
              v-model="form.belt_id"
              class="border p-2 w-full"
              required
            >
              <option v-for="belt in belts" :key="belt.id" :value="belt.id">
                {{ belt.name }}
              </option>
            </select>
          </div>
        </div>

        <div class="mt-4">
          <button type="submit" class="bg-blue-500 text-white px-4 py-2">Salvar Alterações</button>
        </div>
      </form>
    </div>
  </Layout>
</template>

