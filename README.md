Aby uruchomić projekt trzeba wykonać następujące kroki:
1. W programie XAMPP włączyć moduły apache, oraz mySQL.
2. przejśc do panelu zarządzania bazą danych, a następnie dodać bazę o nazwie dentproject. (jeśli chcemy mieć bazę o innej nazwie należy zmienić atrybut w pliku .env)
3. wykonać następujące komendy w terminalu : php artisan migrate, (jeśli chcemy mieć przykładowe rekordy to wykonujemy również komendę php artisan db:seed),php artisan serve.
4. Po wykonaniu tych komend możliwe jest przejście na adres localhost:8000/.


Poprzez interfejs graficzny możemy usuwać użytkowników, zarządzać wizytami. Usługami należy zarządzać poprzez bazę danych.
