<script setup>
import { ref } from "vue";
import { router } from "@inertiajs/vue3";
import { onMounted } from "vue";
import Layout from "@/layouts/AppLayout.vue";

defineProps({ students: Array, belts: Array });

const form = ref({
  name: "",
  birth_date: "",
  belt_id: "",
});

const submit = () => {
  router.post("/admin/students", form.value);
};

const deleteStudent = (id) => {
  if (confirm("Tem certeza que deseja excluir este aluno?")) {
    router.delete(`/admin/students/${id}`);
  }
};
</script>

<template>
  <Layout>
    <div class="p-4">
      <h1 class="text-xl font-bold mb-4">Alunos</h1>

      <form @submit.prevent="submit" class="mb-4 flex items-center space-x-4">
        <div class="flex flex-col">
          <label for="name" class="text-sm font-medium text-gray-700">Nome</label>
          <input v-model="form.name" type="text" placeholder="Nome" class="border p-2" required />
        </div>

        <div class="flex flex-col">
          <label for="birth_date" class="text-sm font-medium text-gray-700">Data de Nascimento</label>
          <input v-model="form.birth_date" type="date" class="border p-2" />
        </div>

        <div class="flex flex-col">
          <label for="belt_id" class="text-sm font-medium text-gray-700">Faixa</label>
          <select v-model="form.belt_id" class="border p-2" required>
            <option v-for="belt in belts" :key="belt.id" :value="belt.id">{{ belt.name }}</option>
          </select>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 mt-5"><i class="fa-solid fa-plus"></i> Adicionar</button>
      </form>

      <table class="w-full border-collapse border">
        <thead>
          <tr class="bg-gray-200">
            <th class="border p-2">Nome</th>
            <th class="border p-2">Data de Nascimento</th>
            <th class="border p-2">Faixa</th>
            <th class="border p-2">Ações</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="student in students" :key="student.id" class="border">
            <td class="border p-2">{{ student.name }}</td>
            <td class="border p-2">{{ student.birth_date }}</td>
            <td class="border p-2">{{ student.belt.name }}</td>
            <td class="border p-2 flex justify-center">
              <button @click="editStudent(student.id)" class="bg-blue-500 text-white px-2 py-1">
                <i class="fa-solid fa-pencil"></i> Editar
              </button>
              <button @click="deleteStudent(student.id)" class="bg-red-500 text-white px-2 py-1 ml-2">
                <i class="fas fa-trash-alt"></i> Excluir
              </button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </Layout>
</template>
