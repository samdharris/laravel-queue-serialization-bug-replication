# Laravel Queue Serialization Bug Replication Repo

Here is the project to replicate a bug Laravel has when deserializing models with constrained eager loaded models.

## Setup
1. Checkout branch
2. Run migrations
3. Run `php artisan db:seed`
4. Go to /
5. check the logs
    1. **Expected** both outputs should match
    2. **Actual** when serializing the provided data for the job, Laravel doesn't seralize any information about any eager loaded models causing any access to `$customer->orders` to perform a lazy load and load all models rather than the eager loaded models that were provided in the controller 
