<!-- resources/js/components/InvoiceListComponent.vue -->
<template>
  <div>
    <div class="card-header">
      <div class="card-tools">
        <div class="input-group input-group-sm" style="width: 150px;">
          <input v-model="searchQuery" @input="searchInvoices" type="text" class="form-control float-right" placeholder="{{__('lang.pages.invoice_list.search')}}">
          <div class="input-group-append">
            <button type="button" class="btn btn-default" @click="searchInvoices">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </div>
    </div>

    <div class="card-body table-responsive p-0">
      <table class="table text-nowrap">
        <thead>
        <tr>
          <th>{{__('lang.pages.invoice_list.table.invoice_number')}}</th>
          <th>{{__('lang.pages.invoice_list.table.customer')}}</th>
          <th>{{__('lang.pages.invoice_list.table.carried_over')}}</th>
          <th>{{__('lang.pages.invoice_list.table.total_purchase')}}</th>
          <th>{{__('lang.pages.invoice_list.table.current_amount')}}</th>
          <th>{{__('lang.pages.invoice_list.table.action')}}</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="invoice in filteredInvoices" :key="invoice.id">
          <td>{{ invoice.invoice_number }}</td>
          <td>{{ invoice.customer.name }}</td>
          <td>{{ invoice.carried_over }}</td>
          <td>{{ invoice.total_purchase }}</td>
          <td>{{ invoice.current_purchase_amount }}</td>
          <td>
            <a :href="invoice.detail_url">
              <label class="primary">{{__('lang.pages.invoice_list.table.view_action')}}</label>
            </a>
          </td>
        </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      searchQuery: '',
      invoices: [],
    };
  },
  methods: {
    searchInvoices() {
      // You can perform an API request or any other logic to fetch/search invoices based on this.searchQuery
      // For simplicity, let's log the search query to the console
      console.log('Searching for:', this.searchQuery);
      // You may want to make an API request here to fetch the filtered invoices
      // For example: axios.get('/api/invoices', { params: { search: this.searchQuery } })
      // Update this.invoices with the response data
    },
    // Function to fetch all invoices when the component is mounted
    fetchInvoices() {
      // For simplicity, let's assume you have an API endpoint (/api/invoices) that returns invoices in JSON format
      axios.get('/api/invoices')
          .then(response => {
            this.invoices = response.data;
          })
          .catch(error => {
            console.error('Error fetching invoices:', error);
          });
    },
  },
  computed: {
    // Computed property to filter invoices based on the search query
    filteredInvoices() {
      return this.invoices.filter(invoice =>
          invoice.invoice_number.toLowerCase().includes(this.searchQuery.toLowerCase()) ||
          invoice.customer.name.toLowerCase().includes(this.searchQuery.toLowerCase())
      );
    },
  },
  mounted() {
    // Fetch all invoices when the component is mounted
    this.fetchInvoices();
  },
};
</script>
