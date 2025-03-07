<script setup>
import { ref } from "vue";
import { router } from "@inertiajs/vue3";
import { onMounted } from "vue";
import Layout from "@/layouts/AppLayout.vue";
import dayjs from "dayjs";
import Swal from 'sweetalert2';
import { displayToast } from "@/components/ui/Toast";
import Create from './Create.vue';

defineProps({ students: Array, belts: Array });

const showModal = ref(false);

const create = () => {
    router.get('/admin/students/create');
}

const editStudent = (id) => {
    router.get(`/admin/students/${id}`);
}

const deleteStudent = (id) => {
    Swal.fire({
        title: "Tem certeza que deseja excluir este aluno?",
        text: "Esta ação é irreversível.",
        confirmButtonText: "Sim, tenho certeza!",
        showCancelButton: true,
        cancelButtonText: "Cancelar!",
        confirmButtonColor: "#4299e1",
        cancelButtonColor: "#fd0004",
    }).then((result) => {
        if (result.isConfirmed) {
            router.delete(`/admin/students/${id}`, {
                onSuccess: () => displayToast("Aluno excluído com sucesso!")
            });
        }
    });
};

const formatDate = (date) => {
    return dayjs(date).format("DD/MM/YYYY");
}
</script>

<template>
    <Layout>
        <div class="p-4">
            <h1 class="text-xl font-bold mb-2">Alunos</h1>

            <button @click="showModal = true" class="bg-blue-500 text-white px-4 py-2 mb-4 rounded">
                <i class="fa-solid fa-plus"></i> Adicionar Aluno
            </button>

            <div v-if="showModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50"
                tabindex="-1">
                <div class="bg-white p-6 rounded shadow-lg w-1/2">
                    <Create :belts="belts" @close="showModal = false" />
                </div>
            </div>

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
                        <td class="border p-2">{{ formatDate(student.birth_date) }}</td>
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
