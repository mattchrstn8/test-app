<script setup>
import ActionMessage from '@/Components/ActionMessage.vue';
import FormSection from '@/Components/FormSection.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { useForm } from '@inertiajs/vue3';

const props = defineProps({
    course: Object
});
const form = useForm({
    name: props.course.name,
    description: props.course.description,
});    
const submitForm = () => {
    form.put(route('courses.update', {course: props.course.id}), {
        preserveScroll: true,
    })
}
</script>
<template>
<FormSection @submitted="submitForm()">
        <template #title>
            Edit your course
        </template>
        <template #description>
            This is the form to edit your course
        </template>
        <template #form>
            <div class="col-span-6 sm:col-span-4">
                <InputLabel value="Course Name"/>
                <TextInput v-model="form.name" type="text"/>
                <InputError :message="form.errors.name"/>
            </div>
            
            <div class="col-span-6 sm:col-span-4">
                <InputLabel value="Course Name"/>
                <TextInput v-model="form.description" type="text"/>
                <InputError :message="form.errors.description"/>
            </div>
        </template>
        <template #actions>
            <ActionMessage :on="form.recentlySuccessful">
                Saved.
            </ActionMessage>
            <PrimaryButton type="submit">Save</PrimaryButton>
        </template>
    </FormSection>
</template>