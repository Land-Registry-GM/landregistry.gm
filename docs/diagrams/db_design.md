```mermaid
erDiagram
    PROPERTIES {
        string parcel_id PK
        string street
        string city
        string state
        string postal_code
        string country
        decimal centroid_lat
        decimal centroid_lng
        json boundary_coordinates
        decimal area
        string land_use_type
        string zoning
        string survey_plan_number
        text boundary_description
        datetime created_at
        datetime updated_at
        datetime deleted_at
    }

    OWNERS {
        int id PK
        string owner_name
        string owner_id_type
        string owner_id_number
        string phone
        string email
        text address
    }

    PROPERTY_OWNER {
        int property_id FK
        int owner_id FK
        string ownership_type
        date acquisition_date
        boolean is_current_owner
        datetime created_at
        datetime updated_at
    }

    LEGAL_ENCUMBRANCES {
        int id PK
        int property_id FK
        string encumbrance_type
        text description
        string institution
        decimal amount
        date start_date
        date end_date
        boolean is_active
    }

    TRANSACTIONS {
        int id PK
        int property_id FK
        string transaction_type
        int buyer_id FK
        int seller_id FK
        decimal amount
        date transaction_date
        string deed_number
        boolean tax_paid
        string recorded_by
    }

    TAX_RECORDS {
        int id PK
        int property_id FK
        decimal assessed_value
        integer tax_year
        decimal tax_due
        boolean tax_paid
        date last_payment_date
    }

    SURVEYS {
        int id PK
        int property_id FK
        string surveyor_name
        date survey_date
        string map_image_url
    }

    PERMITS {
        int id PK
        int property_id FK
        string permit_type
        string permit_number
        date issue_date
        date expiry_date
        string issuing_authority
        string status
    }

    DISPUTES {
        int id PK
        int property_id FK
        string dispute_type
        string complainant
        string respondent
        string case_number
        string court_name
        string status
        text resolution
    }

    DOCUMENTS {
        int id PK
        int property_id FK
        string document_type
        string file_url
        int uploaded_by FK
    }

    OWNERSHIP_HISTORY {
        int id PK
        int owner_id FK
        string previous_owner
        date transfer_date
        string deed_number
    }

    TAX_EXEMPTIONS {
        int id PK
        int tax_record_id FK
        string type
        decimal amount
    }

    BOUNDARY_MARKERS {
        int id PK
        int survey_id FK
        string type
        decimal latitude
        decimal longitude
    }

    PROPERTIES ||--o{ LEGAL_ENCUMBRANCES : has
    PROPERTIES ||--o{ TRANSACTIONS : has
    PROPERTIES ||--o{ TAX_RECORDS : has
    PROPERTIES ||--o{ SURVEYS : has
    PROPERTIES ||--o{ PERMITS : has
    PROPERTIES ||--o{ DISPUTES : has
    PROPERTIES ||--o{ DOCUMENTS : has
    PROPERTIES }o--o{ OWNERS : "many-to-many"
    OWNERS ||--o{ OWNERSHIP_HISTORY : has
    OWNERS ||--o{ TRANSACTIONS : "as buyer"
    OWNERS ||--o{ TRANSACTIONS : "as seller"
    TAX_RECORDS ||--o{ TAX_EXEMPTIONS : has
    SURVEYS ||--o{ BOUNDARY_MARKERS : has