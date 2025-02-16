<div class="p-6 ">
    <x-header title="Welcome Admin" subtitle="Fill in the required information to register a new member" info/>


    <!-- Stats Section -->
<div class="grid grid-cols-1 gap-6 mt-4 md:grid-cols-4">
        <!-- Active Members -->
        <x-stat :value="$this->activeCount" :title="'Total Members'" :subtitle="'Total Members'" :color="'primary'"/>

        <x-stat :value="$this->activeCount" :title="'Active Members'" :subtitle="'Total active members in the system'" :color="'positive'"/>
        <x-stat :value="$this->inactiveCount" :title="'Inactive Members'" subtitle="{!! 'Members who haven\'t been active recently' !!}" :color="'warning'"/>
        <x-stat :value="$this->terminatedCount" :title="'Terminated Members'" :subtitle="'Members who have been terminated'" :color="'negative'"/>

    </div>

    <!-- Optional: You can add more statistics or charts here -->
</div>
