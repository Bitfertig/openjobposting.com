<!-- <template>
<div></div>
</template> -->

<script>
import { Line } from 'vue-chartjs'
export default {
    extends: Line,
    props: {
        chartdata: {
            type: Object,
            default: null
        },
        /* options: {
            type: Object,
            default: null
        } */
    },
    data: () => ({
        /* chartdata: {
            labels: ['January', 'February'],
            datasets: [
                {
                    label: 'Data One',
                    backgroundColor: '#eee40a',
                    data: [40, 20]
                }
            ]
        }, */
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                yAxes: [{
                    ticks: {
                        precision: 0
                    }
                }]
            }
        }
    }),
    mounted () {
        this.renderChart(this.chartdata, this.options)
    }
}
</script>

<style></style>
