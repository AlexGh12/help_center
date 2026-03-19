# API Documentation

This section contains the API documentation.

## Endpoints

| Method | Endpoint | Description |
|--------|----------|-------------|
| GET | /users | List all users |
| POST | /users | Create a new user |
| GET | /users/{id} | Get user by ID |
| PUT | /users/{id} | Update user |
| DELETE | /users/{id} | Delete user |

## Authentication Flow

```mermaid
graph TD
    A[User Login] --> B[App sends credentials]
    B --> C[API validates]
    C --> D{Valid?}
    D -->|Yes| E[Return JWT Token]
    D -->|No| F[Return Error]
    E --> G[Store Token]
    F --> H[Show Error Message]
```

## Sequence Diagram

```mermaid
sequenceDiagram
    participant U as User
    participant A as App
    participant S as Server
    U->>A: Login
    A->>S: Auth Request
    S-->>A: JWT Token
    A-->>U: Authenticated
```

## Architecture

```mermaid
graph LR
    A[Client] --> B[Load Balancer]
    B --> C[Server 1]
    B --> D[Server 2]
    C --> E[(Database)]
    D --> E
```
