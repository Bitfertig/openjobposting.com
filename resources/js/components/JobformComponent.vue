<template>
    <div>

        <h1>{{ $t('Job entry') }}</h1>{{ $i18n.locale }}

        <div class="row">
            <div class="col col-md-6">

                <div class="form-group">
                    <label for="date_posted">{{ $t('Date posted') }}</label>
                    <input type="date" class="form-control" id="date_posted" aria-describedby="date_posted_help" v-model="date_posted">
                    <small id="date_posted_help" class="form-text text-muted">help.</small>
                </div>

                <div class="form-group">
                    <label for="valid_through">{{ $t('Expire date') }}</label>
                    <input type="date" class="form-control" id="valid_through" aria-describedby="valid_through_help" v-model="valid_through">
                    <small id="valid_through_help" class="form-text text-muted">help.</small>
                </div>

                <div class="form-group">
                    <label for="title">{{ $t('Title') }}</label>
                    <input type="text" class="form-control" id="title" aria-describedby="title_help" v-model="title">
                    <small id="title_help" class="form-text text-muted">help.</small>
                </div>

                <div class="form-group">
                    <label for="description">{{ $t('Description') }}</label>
                    <textarea class="form-control" id="description" rows="4" aria-describedby="description_help" v-model="description"></textarea>
                    <small id="description_help" class="form-text text-muted">help.</small>
                </div>

                <div class="form-group">
                    <label for="organization">{{ $t('Organization') }}</label>
                    <input type="text" class="form-control" id="organization" aria-describedby="organization_help" v-model="organization">
                    <small id="organization_help" class="form-text text-muted">help.</small>
                </div>

                <div class="form-group">
                    <label for="organization_url">{{ $t('Organization URL') }}</label>
                    <input type="url" class="form-control" id="organization_url" aria-describedby="organization_url_help" v-model="organization_url">
                    <small id="organization_url_help" class="form-text text-muted">help.</small>
                </div>

                <div class="form-group">
                    <label for="employment_type">{{ $t('Employment type') }}</label>
                    <select class="form-control" id="employment_type" aria-describedby="employment_type_help" v-model="employment_type">
                        <option value="FULL_TIME">{{ $t('Full time') }}</option>
                        <option value="PART_TIME">{{ $t('Part time') }}</option>
                        <option value="CONTRACTOR">{{ $t('Contractor') }}</option>
                        <option value="TEMPORARY">{{ $t('Temporary') }}</option>
                        <option value="INTERN">{{ $t('Intern') }}</option>
                        <option value="VOLUNTEER">{{ $t('Volunteer') }}</option>
                        <option value="PER_DIEM">{{ $t('Per diem') }}</option>
                        <option value="OTHER">{{ $t('Other') }}</option>
                    </select>
                    <small id="employment_type_help" class="form-text text-muted">help.</small>
                </div>

                <div class="form-group">
                    <label for="street">{{ $t('Street') }}</label>
                    <input type="text" class="form-control" id="street" aria-describedby="street_help" v-model="street">
                    <small id="street_help" class="form-text text-muted">help.</small>
                </div>

                <div class="form-group">
                    <label for="postal_code">{{ $t('Postal code') }}</label>
                    <input type="text" class="form-control" id="postal_code" aria-describedby="postal_code_help" v-model="postal_code">
                    <small id="postal_code_help" class="form-text text-muted">help.</small>
                </div>

                <div class="form-group">
                    <label for="city">{{ $t('City') }}</label>
                    <input type="text" class="form-control" id="city" aria-describedby="city_help" v-model="city">
                    <small id="city_help" class="form-text text-muted">help.</small>
                </div>

                <div class="form-group">
                    <label for="country">{{ $t('Country') }}</label>
                    <select class="form-control" id="country" aria-describedby="country_help" v-model="country">
                        <template v-for="(item, index) in countryFlagEmoji.list">
                            <option :key="index" :value="item.code">{{ item.name }} {{ item.emoji }}</option>
                        </template>
                    </select>
                    <small id="country_help" class="form-text text-muted">help.</small>
                </div>


            </div>
        </div>

    </div>
</template>

<script>
export default {
    data: function() {
        return {
            date_posted: '',
            valid_through: '',
            title: '',
            description: '',
            organization: '',
            organization_url: '',
            employment_type: 'FULL_TIME',
            street: '',
            city: '',
            postal_code: '',
            country: '',
        }
    },
    mounted() {
        console.log('Component mounted.')
        //this.$i18n.locale = 'de';
    }
}
</script>
