<script setup>
import { ref } from "vue";
import { router } from "@inertiajs/vue3";
import { displayToast } from "@/components/ui/Toast";

defineProps({ belts: Array });

const emit = defineEmits(["close"]);

const form = ref({
    name: "",
    birth_date: "",
    belt_id: "",
});

const showModal = ref(false);

const submit = () => {
    router.post("/admin/students", form.value, {
        onSuccess: () => {
            emit("close");
            displayToast("Aluno criado com sucesso!");
        },
    });
};
</script>

<template>
    <form @submit.prevent="submit" class="space-y-4">
        <h2 class="text-xl font-bold mb-4">Adicionar Aluno</h2>

        <div class="flex items-center space-x-4">
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
        </div>

        <button type="button" @click="emit('close')" class="mt-4 bg-gray-500 text-white px-4 py-2 rounded mr-2">
            <i class="fa-solid fa-xmark mr-2"></i>Fechar
        </button>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">
            <i class="fa-solid fa-check"></i> Salvar
        </button>
    </form>
</template>
