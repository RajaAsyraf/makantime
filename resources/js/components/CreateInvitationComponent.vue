<template>
    <form @submit.prevent="submit">
        <div class="card-header">
            <h4>Ajak Orang</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <label>Group</label>
                        <select class="form-control" name="group_id" id="group_id" v-model="fields.group_id" @change="onGroupChange($event)" required>
                            <option value="0" disabled>Select group</option>
                            <option v-for="group in groups" :key="group.id" :value="group.id">{{ group.name }}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Restaurant</label>
                        <select class="form-control" name="restaurant_id" id="restaurant_id" v-model="fields.restaurant_id" required>
                            <option value="0" disabled>Select restaurant</option>
                            <option v-for="resturant in restaurants" :key="resturant.id" :value="resturant.id">{{ resturant.name }}</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <label>Time</label>
                        <input type="time" class="form-control" name="time" v-model="fields.time" required>
                    </div>
                    <div class="form-group">
                        <label>Date</label>
                        <input type="date" class="form-control" name="date" v-model="fields.date" required>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-success">Submit</button>
        </div>
    </form>
</template>


<script>
import FormMixin from '../FormMixin';

export default {
    mixins: [ FormMixin ],
    data() {
        return {
            fields: {
                group_id: Number(0),
                restaurant_id: Number(0),
            },
            route: this.submitRoute,
            restaurants: Array,
        }
    },
    props: {
        submitRoute: String,
        groups: Array,
    },
    methods: {
        onGroupChange($event) {
            this.fields.restaurant_id = 0;
            this.restaurants = this.groups[$event.target.selectedIndex - 1].restaurants;
        },
        successAlert() {
            swal("Success!", "Invitation has successfully sent to the group members.", "success");
        }
    }
}
</script>