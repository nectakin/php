
// localStorage.clear() - повернення змін

// Функція для вимірювання часу
const performanceTimer = {
    startTime: 0,
    endTime: 0,
    
    start() {
        this.startTime = performance.now();
    },
    
    end() {
        this.endTime = performance.now();
        return this.endTime - this.startTime;
    }
};

// Запускаємо таймер при початку завантаження сторінки
performanceTimer.start();

// Основний об'єкт для управління редагуванням контенту
const contentEditor = {
    // Ініціалізація
    init() {
        this.setupEventListeners();
        this.loadSavedContent();
        this.displayPerformanceMetrics();
    },

    // Завантажити збережений вміст для конкретного елемента
loadSavedContentForElement(element) {
    try {
        const selector = this.getElementSelector(element);
        const keyPrefix = `page-content-${window.location.pathname}`;
        const keys = Object.keys(localStorage).filter(k => k.startsWith(keyPrefix));

        for (const key of keys) {
            const data = JSON.parse(localStorage.getItem(key));
            if (data && data.selector === selector) {
                element.innerHTML = data.content;
                console.log(`Відновлено контент для елемента: ${selector}`);
                break;
            }
        }
    } catch (e) {
        console.warn("Помилка при завантаженні елемента:", e);
    }
},


    // Налаштування обробників подій
    setupEventListeners() {
        document.addEventListener('click', (e) => {
            const target = e.target;
            
            // Перевіряємо, чи елемент підходить для редагування
            if (this.isEditableElement(target)) {
                e.preventDefault();
                e.stopPropagation();
                this.showEditForm(target);
            }
        });
    },

    // Перевірка, чи елемент підходить для редагування
    isEditableElement(element) {
        // Виключаємо форми, кнопки, посилання та інші елементи управління
        const excludedTags = ['FORM', 'INPUT', 'BUTTON', 'SELECT', 'TEXTAREA', 'A'];
        if (excludedTags.includes(element.tagName)) {
            return false;
        }

        // Перевіряємо, чи елемент має текстовий вміст або є блоковим елементом
        const hasContent = element.textContent.trim().length > 0 || 
                          element.children.length > 0;
        const isVisible = element.offsetWidth > 0 && element.offsetHeight > 0;

        return hasContent && isVisible;
    },

    // Показати форму редагування
    showEditForm(element) {
        // Видалити існуючу форму, якщо вона є
        this.removeExistingForm();

        // Створити нову форму
        const form = this.createEditForm(element);
        element.appendChild(form);

        // Зосередитися на полі введення
        setTimeout(() => {
            form.querySelector('textarea').focus();
        }, 100);
    },

    // Створити форму редагування
    createEditForm(element) {
        const form = document.createElement('div');
        form.className = 'content-edit-form';
        form.innerHTML = `
            <div class="edit-form-overlay">
                <div class="edit-form-content">
                    <h3>Редагування вмісту</h3>
                    <textarea placeholder="Введіть новий вміст...">${element.innerHTML}</textarea>
                    <div class="edit-form-buttons">
                        <button type="button" class="save-btn">Зберегти</button>
                        <button type="button" class="cancel-btn">Скасувати</button>
                    </div>
                </div>
            </div>
        `;

        // Додати обробники подій для кнопок
        form.querySelector('.save-btn').addEventListener('click', () => {
            this.saveContent(element, form);
        });

        form.querySelector('.cancel-btn').addEventListener('click', () => {
            this.removeExistingForm();
        });

        // Закрити форму при кліку поза нею
        form.querySelector('.edit-form-overlay').addEventListener('click', (e) => {
            if (e.target === e.currentTarget) {
                this.removeExistingForm();
            }
        });

        return form;
    },

    // Видалити існуючу форму
    removeExistingForm() {
        const existingForm = document.querySelector('.content-edit-form');
        if (existingForm) {
            existingForm.remove();
        }
    },

    // Зберегти вміст
    saveContent(element, form) {
        const textarea = form.querySelector('textarea');
        const newContent = textarea.value.trim();
        
        if (newContent) {
            // Оновити вміст елемента
            element.innerHTML = newContent;
            
            // Зберегти в localStorage
            this.saveToLocalStorage(element, newContent);
            
            // Показати сповіщення
            this.showNotification('Вміст успішно збережено!');
        }
        
        this.removeExistingForm();
    },

    // Зберегти в localStorage
    saveToLocalStorage(element, content) {
        const key = this.generateStorageKey(element);
        const data = {
            content: content,
            timestamp: new Date().toISOString(),
            selector: this.getElementSelector(element)
        };
        
        localStorage.setItem(key, JSON.stringify(data));
    },

    // Завантажити збережений вміст
    loadSavedContent() {
        const loadStartTime = performance.now();
        
        // Отримати всі ключі з localStorage
        const keys = Object.keys(localStorage);
        let loadedCount = 0;

        keys.forEach(key => {
            if (key.startsWith('page-content-')) {
                try {
                    const data = JSON.parse(localStorage.getItem(key));
                    
                    if (data && data.selector && data.content) {
                        const element = document.querySelector(data.selector);
                        if (element) {
                            element.innerHTML = data.content;
                            loadedCount++;
                        }
                    }
                } catch (error) {
                    console.warn(`Помилка завантаження даних для ключа ${key}:`, error);
                }
            }
        });

        const loadTime = performance.now() - loadStartTime;
        console.log(`Завантажено ${loadedCount} елементів з localStorage за ${loadTime.toFixed(2)}мс`);
        
        return loadTime;
    },

    // Генерувати ключ для localStorage
    generateStorageKey(element) {
        const page = window.location.pathname;
        const selector = this.getElementSelector(element);
        return `page-content-${page}-${btoa(selector).slice(0, 16)}`;
    },

    // Отримати CSS селектор для елемента
    getElementSelector(element) {
        if (element.id) {
            return `#${element.id}`;
        }
        
        // Створити унікальний шлях через батьківські елементи
        const path = [];
        let currentElement = element;
        
        while (currentElement && currentElement.nodeType === Node.ELEMENT_NODE) {
            let selector = currentElement.nodeName.toLowerCase();
            
            if (currentElement.className) {
                const classes = currentElement.className.toString().split(/\s+/);
                if (classes.length > 0) {
                    selector += '.' + classes[0];
                }
            }
            
            // Додати позицію серед siblings
            const siblings = Array.from(currentElement.parentNode.children);
            const index = siblings.indexOf(currentElement);
            selector += `:nth-child(${index + 1})`;
            
            path.unshift(selector);
            currentElement = currentElement.parentNode;
        }
        
        return path.join(' > ');
    },

    // Показати сповіщення
    showNotification(message) {
        const notification = document.createElement('div');
        notification.className = 'edit-notification';
        notification.textContent = message;
        notification.style.cssText = `
            position: fixed;
            top: 20px;
            right: 20px;
            background: #4CAF50;
            color: white;
            padding: 15px 20px;
            border-radius: 5px;
            z-index: 10000;
            animation: fadeInOut 3s ease-in-out;
        `;

        document.body.appendChild(notification);

        setTimeout(() => {
            notification.remove();
        }, 3000);
    },

    // Відобразити метрики продуктивності
    displayPerformanceMetrics() {
        const pageLoadTime = performanceTimer.end();
        const localStorageLoadTime = this.loadSavedContent();
        
        console.group('Метрики продуктивності сторінки');
        console.log(`Час завантаження сторінки: ${pageLoadTime.toFixed(2)}мс`);
        console.log(`Час завантаження з localStorage: ${localStorageLoadTime.toFixed(2)}мс`);
        console.log(`Загальний час: ${(pageLoadTime + localStorageLoadTime).toFixed(2)}мс`);
        console.groupEnd();

        // Можна також відобразити цю інформацію на сторінці
        this.createPerformanceDisplay(pageLoadTime, localStorageLoadTime);
    },

    // Створити відображення метрик продуктивності (опціонально)
    createPerformanceDisplay(pageLoadTime, localStorageLoadTime) {
        const perfDisplay = document.createElement('div');
        perfDisplay.className = 'performance-metrics';
        perfDisplay.style.cssText = `
            position: fixed;
            bottom: 10px;
            right: 10px;
            background: rgba(0,0,0,0.8);
            color: white;
            padding: 10px;
            border-radius: 5px;
            font-size: 12px;
            z-index: 9999;
            display: none; /* Приховано за замовчуванням */
        `;
        
        perfDisplay.innerHTML = `
            <div>Завантаження: ${pageLoadTime.toFixed(2)}мс</div>
            <div>LocalStorage: ${localStorageLoadTime.toFixed(2)}мс</div>
            <div>Всього: ${(pageLoadTime + localStorageLoadTime).toFixed(2)}мс</div>
        `;

        document.body.appendChild(perfDisplay);

        // Показати при натисканні Ctrl+Shift+P
        document.addEventListener('keydown', (e) => {
            if (e.ctrlKey && e.shiftKey && e.key === 'P') {
                e.preventDefault();
                perfDisplay.style.display = perfDisplay.style.display === 'none' ? 'block' : 'none';
            }
        });
    }
};

// Додати CSS стилі
const addStyles = () => {
    const styles = `
        .content-edit-form .edit-form-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.5);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
        }
        
        .content-edit-form .edit-form-content {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            max-width: 500px;
            width: 90%;
            max-height: 80vh;
            overflow-y: auto;
        }
        
        .content-edit-form textarea {
            width: 100%;
            height: 200px;
            margin: 10px 0;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            resize: vertical;
            font-family: inherit;
            font-size: inherit;
        }
        
        .edit-form-buttons {
            display: flex;
            gap: 10px;
            justify-content: flex-end;
        }
        
        .edit-form-buttons button {
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        
        .save-btn {
            background: #4CAF50;
            color: white;
        }
        
        .cancel-btn {
            background: #f44336;
            color: white;
        }
        
        @keyframes fadeInOut {
            0% { opacity: 0; transform: translateY(-20px); }
            10% { opacity: 1; transform: translateY(0); }
            90% { opacity: 1; transform: translateY(0); }
            100% { opacity: 0; transform: translateY(-20px); }
        }
        
        /* Візуальний індикатор для елементів, що можна редагувати */
        [data-editable] {
            transition: background-color 0.2s;
        }
        
        [data-editable]:hover {
            background-color: rgba(76, 175, 80, 0.1) !important;
            outline: 2px dashed #4CAF50;
        }
    `;

    const styleSheet = document.createElement('style');
    styleSheet.textContent = styles;
    document.head.appendChild(styleSheet);
};

// Ініціалізація при завантаженні DOM
document.addEventListener('DOMContentLoaded', () => {
    addStyles();
    contentEditor.init();
});

// Додаткові обробники для динамічного контенту
const observer = new MutationObserver((mutations) => {
    mutations.forEach((mutation) => {
        mutation.addedNodes.forEach((node) => {
            if (node.nodeType === Node.ELEMENT_NODE) {
                // Перевірити, чи є збережені дані для нового елемента
                contentEditor.loadSavedContentForElement(node);
            }
        });
    });
});

// Спостереження за змінами в DOM
observer.observe(document.body, {
    childList: true,
    subtree: true
});