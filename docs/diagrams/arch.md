```mermaid
flowchart TD
    A[User] -->|HTTP:8080| B[Nginx:latest]
    B -->|PHP Requests| C[php-fpm]
    C -->|Database| D[(Postgres:16)]
    C -->|Cache| E[(Redis:alpine)]
    F[workspace] -->|Dev Tools| C
    F -->|Artisan Commands| D
    F -->|Queue Jobs| E
    
    subgraph Docker Host
        B
        C
        F
        D
        E
    end
    
    style A fill:#f9f,stroke:#333
    style B fill:#79f,stroke:#333
    style C fill:#9cf,stroke:#333
    style D fill:#7db,stroke:#333
    style E fill:#f77,stroke:#333
    style F fill:#ccf,stroke:#333