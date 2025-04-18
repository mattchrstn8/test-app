<script setup>
import Container from '@/Components/Container.vue';
import AppLayout from '@/Layouts/AppLayout.vue';
import UpdateForm from './UpdateForm.vue';
import DeteleForm from './DeteleForm.vue';
import SectionBorder from '@/Components/SectionBorder.vue';

const props = defineProps({
    course: Object
});
</script>
<template>
<AppLayout title="Edit">
    <template #header>
        Edit #{{ course.id }}
    </template>
    <Container class="py-16">
      <UpdateForm :course="course"/>
      <SectionBorder></SectionBorder>
      <DeteleForm :course="course"/>
    </Container>
</AppLayout>
</template>