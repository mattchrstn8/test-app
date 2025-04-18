<script setup>
import { ref } from "vue";
import { router } from "@inertiajs/vue3";
import ActionSection from "@/Components/ActionSection.vue";
import ConfirmationModal from "@/Components/ConfirmationModal.vue";
import DangerButton from "@/Components/DangerButton.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";

const props = defineProps({
    course: Object,
});

const open = ref(false);

const deleteCourse = () => {
    router.delete(route('courses.delete', {course: props.course.id}))
}
     
</script>
<template>
    <ActionSection>
        <template #title> Delete Course </template>
        <template #description>
            Once your course is deleted, all of its resources and data will be
            permanently deleted. Before deleting your course, please download
            any data or information regarding this course that you wish to
            retain.
        </template>
        <template #content>
            <DangerButton @click="open = true"> Delete Course </DangerButton>

            <ConfirmationModal @close="open = false" :show="open">
                <template #title> Delete Course </template>
                <template #content>
                    Are you sure you want to delete this course #
                    {{ course.id }}, {{ course.name }}?
                </template>
                <template #footer>
                    <DangerButton @click="deleteCourse()" class="mr-4"
                        >Delete</DangerButton
                    >
                    <SecondaryButton @click="open = false"
                        >Cancel</SecondaryButton
                    >
                </template>
            </ConfirmationModal>
        </template>
    </ActionSection>
</template>
