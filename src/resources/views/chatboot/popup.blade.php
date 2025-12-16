<div class="popup-chatboot">    <!-- Floating Chat Button -->

    <style>
        /* Floating Chat Button */
       .popup-chatboot .chat-float-btn {
            position: fixed;
            bottom: 20px;
            right: 20px;
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #007bff, #0056b3);
            border-radius: 50%;
            box-shadow: 0 4px 20px rgba(0, 123, 255, 0.2);
            border: none;
            cursor: pointer;
            z-index: 1000;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 24px;
        }

       .popup-chatboot .chat-float-btn:hover {
            transform: scale(1.1);
            box-shadow: 0 6px 25px rgba(0, 123, 255, 0.6);
        }

       .popup-chatboot .chat-float-btn.active {
            background: linear-gradient(135deg, #dc3545, #bd2130);
        }

        /* Chat Popup Modal */
       .popup-chatboot .chat-popup {
            position: fixed;
            bottom: 90px;
            right: 20px;
            width: 500px;
            height: 650px;
            background: white;
            border-radius: 16px;
            box-shadow: 0 8px 40px rgba(0, 0, 0, 0.15);
            z-index: 999;
            display: none;
            flex-direction: column;
            overflow: hidden;
            border: 2px solid #e9ecef;
        }

       .popup-chatboot .chat-popup.active {
            display: flex;
            animation: slideUp 0.3s ease-out;
        }

        /* @keyframes slideUp {
            from {
                transform: translateY(100%);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        } */

        /* Chat Header */
       .popup-chatboot .chat-header {
            background: linear-gradient(135deg, #007bff, #0056b3);
            color: white;
            padding: 16px;
            border-radius: 16px 16px 0 0;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

       .popup-chatboot .chat-header-info {
            display: flex;
            align-items: center;
            gap: 12px;
        }

       .popup-chatboot .chat-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
        }

       .popup-chatboot .chat-header-text h4 {
            margin: 0;
            font-size: 16px;
            font-weight: 600;
        }

       .popup-chatboot .chat-header-text p {
            margin: 0;
            font-size: 12px;
            opacity: 0.8;
        }

       .popup-chatboot .chat-close {
            background: none;
            border: none;
            color: white;
            font-size: 20px;
            cursor: pointer;
            padding: 4px;
            border-radius: 4px;
            transition: background 0.2s;
        }

       .popup-chatboot .chat-close:hover {
            background: rgba(255, 255, 255, 0.1);
        }

        /* Chat Messages */
       .popup-chatboot .chat-messages {
            flex: 1;
            overflow-y: auto;
            padding: 16px;
            background: #f8f9fa;
        }

       .popup-chatboot .chat-message {
            margin-bottom: 16px;
            display: flex;
            align-items: flex-start;
            gap: 8px;
        }

       .popup-chatboot .chat-message.user {
            flex-direction: row-reverse;
        }

       .popup-chatboot .chat-message-avatar {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            flex-shrink: 0;
        }

       .popup-chatboot .chat-message.bot .chat-message-avatar {
            background: #007bff;
            color: white;
        }

       .popup-chatboot .chat-message.user .chat-message-avatar {
            background: #28a745;
            color: white;
        }

       .popup-chatboot .chat-message-content {
            max-width: 70%;
            padding: 12px 16px;
            border-radius: 16px;
            font-size: 14px;
            line-height: 1.4;
        }

       .popup-chatboot .chat-message.bot .chat-message-content {
            background: white;
            border: 1px solid #e9ecef;
            border-bottom-left-radius: 4px;
        }

       .popup-chatboot .chat-message.user .chat-message-content {
            background: #007bff;
            color: white;
            border-bottom-right-radius: 4px;
        }

       .popup-chatboot .chat-message-time {
            font-size: 11px;
            color: #6c757d;
            margin-top: 4px;
            text-align: center;
        }

        /* Welcome Message */
       .popup-chatboot .welcome-message {
            background: linear-gradient(135deg, #e3f2fd, #bbdefb);
            border: 1px solid #90caf9;
            border-radius: 12px;
            padding: 16px;
            margin-bottom: 16px;
            text-align: center;
        }

       .popup-chatboot .welcome-message h5 {
            color: #1565c0;
            margin-bottom: 8px;
            font-size: 14px;
        }

       .popup-chatboot .welcome-message p {
            color: #1976d2;
            font-size: 12px;
            margin: 0;
        }

        /* Typing Indicator */
       .popup-chatboot .typing-indicator {
            display: none;
            align-items: center;
            gap: 8px;
            padding: 8px 16px;
            background: #f8f9fa;
            border-top: 1px solid #e9ecef;
        }

       .popup-chatboot .typing-indicator.active {
            display: flex;
        }

       .popup-chatboot .typing-dots {
            display: flex;
            gap: 4px;
        }

       .popup-chatboot .typing-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: #6c757d;
            animation: typing 1.4s infinite;
        }

       .popup-chatboot .typing-dot:nth-child(2) {
            animation-delay: 0.2s;
        }

       .popup-chatboot .typing-dot:nth-child(3) {
            animation-delay: 0.4s;
        }

        /* @keyframes typing {
            0%, 60%, 100% {
                transform: translateY(0);
            }
            30% {
                transform: translateY(-10px);
            }
        } */

        /* Chat Input */
       .popup-chatboot .chat-input {
            border-top: 1px solid #e9ecef;
            padding: 12px;
            background: white;
            border-radius: 0 0 16px 16px;
        }

       .popup-chatboot .chat-input-container {
            display: flex;
            gap: 8px;
            align-items: flex-end;
        }

       .popup-chatboot .chat-input textarea {
            flex: 1;
            border: 1px solid #e9ecef;
            border-radius: 20px;
            padding: 8px 16px;
            font-size: 14px;
            resize: none;
            min-height: 36px;
            max-height: 100px;
            outline: none;
            transition: border-color 0.2s;
        }

       .popup-chatboot .chat-input textarea:focus {
            border-color: #007bff;
        }

       .popup-chatboot .chat-send-btn {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: #007bff;
            border: none;
            color: white;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background 0.2s;
            flex-shrink: 0;
        }

       .popup-chatboot .chat-send-btn:hover {
            background: #0056b3;
        }

       .popup-chatboot .chat-send-btn:disabled {
            background: #6c757d;
            cursor: not-allowed;
        }

        /* Agent Status */
       .popup-chatboot .agent-status-mini {
            background: #f8f9fa;
            border: 1px solid #e9ecef;
            border-radius: 8px;
            padding: 8px;
            margin-bottom: 12px;
            font-size: 12px;
        }

       .popup-chatboot .agent-status-mini .status-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: #28a745;
            display: inline-block;
            margin-right: 6px;
        }

        /* Response metadata */
       .popup-chatboot .response-metadata {
            margin-top: 8px;
            font-size: 11px;
            color: #6c757d;
        }

       .popup-chatboot .metadata-chip {
            display: inline-block;
            background: #e9ecef;
            padding: 2px 6px;
            border-radius: 10px;
            margin-right: 4px;
            margin-bottom: 4px;
        }

        /* Scrollbar */
       .popup-chatboot .chat-messages::-webkit-scrollbar {
            width: 6px;
        }

       .popup-chatboot .chat-messages::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

       .popup-chatboot .chat-messages::-webkit-scrollbar-thumb {
            background: #c1c1c1;
            border-radius: 3px;
        }

       .popup-chatboot .chat-messages::-webkit-scrollbar-thumb:hover {
            background: #a8a8a8;
        }

        /* Quick Actions */
       .popup-chatboot .quick-actions {
            display: flex;
            gap: 8px;
            margin-bottom: 12px;
            flex-wrap: wrap;
        }

       .popup-chatboot .quick-btn {
            padding: 6px 12px;
            background: #e9ecef;
            border: 1px solid #dee2e6;
            border-radius: 16px;
            font-size: 12px;
            cursor: pointer;
            transition: all 0.2s;
        }

       .popup-chatboot .quick-btn:hover {
            background: #007bff;
            color: white;
            border-color: #007bff;
        }

        /* Responsive */
        @media (max-width: 480px) {
           .popup-chatboot .chat-popup {
                width: calc(100vw - 40px);
                height: calc(100vh - 120px);
                right: 20px;
            }
        }
    </style>


    <button class="chat-float-btn" id="chatFloatBtn">
        <!-- <i class="ba ba-comments"></i> -->
        <img src="{{ asset("assets/chatboot/logo.png") }}" alt="">
    </button>

    <!-- Chat Popup -->
    <div class="chat-popup" id="chatPopup">
        <!-- Chat Header -->
        <div class="chat-header">
            <div class="chat-header-info">
                <div class="chat-avatar">
                    <img src="{{ asset("assets/chatboot/logo.png") }}" alt="">
                </div>
                <div class="chat-header-text">
                    <h4>HumanJOBS Assistant</h4>
                    <p>Assistant RH Multi-Agents</p>
                </div>
            </div>
            <button class="chat-close " id="chatClose">
                <!-- <i class="bi bi-times"></i> -->
                <!-- <img src="{{ asset("assets/chatboot/logo.png") }}" alt=""> -->
            </button>
        </div>

        <!-- Chat Messages -->
        <div class="chat-messages" id="chatMessagesPopup">
            <!-- Agent Status -->
            <!-- <div class="agent-status-mini">
                <span class="status-dot"></span>
                <span>Agents connectés et prêts</span>
            </div> -->

            <!-- Welcome Message -->
            <div class="welcome-message">
                <h5><i class="bi bi-hands-helping"></i> Bienvenue !</h5>
                <p>Posez vos questions sur les ressources humaines au Maroc.</p>
            </div>

            <!-- Quick Actions -->
            <div class="quick-actions">
                <button class="quick-btn" onclick="askQuickQuestion('Congés payés au Maroc')">
                    <i class="bi bi-calendar"></i> Congés
                </button>
                <button class="quick-btn" onclick="askQuickQuestion('Calcul salaire net')">
                    <i class="bi bi-calculator"></i> Salaire
                </button>
                <button class="quick-btn" onclick="askQuickQuestion('Processus recrutement')">
                    <i class="bi bi-person"></i> Recrutement
                </button>
            </div>
        </div>

        <!-- Typing Indicator -->
        <div class="typing-indicator" id="typingIndicator">
            <div class="typing-dots">
                <div class="typing-dot"></div>
                <div class="typing-dot"></div>
                <div class="typing-dot"></div>
            </div>
            <span>Assistant en train d'écrire...</span>
        </div>

        <!-- Chat Input -->
        <div class="chat-input">
            <div class="chat-input-container">
                <textarea 
                    id="chatInput" 
                    placeholder="Tapez votre message..."
                    rows="1"
                ></textarea>
                <button class="chat-send-btn" id="chatSendBtn">
                    <!-- <i class="bi bi-paper-plane"></i> -->
                    <i class="bi bi-send"></i>
                </button>
            </div>
        </div>
    </div>
</div>

    <script>
        class PopupChatWidget {
            constructor() {
                this.apiEndpoint = 'http://127.0.0.1:8000';
                this.messageHistory = [];
                this.currentSessionId = this.generateSessionId();
                this.isConnected = false;
                this.isOpen = false;
                this.agentDescriptions = {
                    'orchestrator': "L'agent Orchestrateur coordonne tous les agents spécialisés. Il analyse votre question, détermine quels agents sont nécessaires pour y répondre, et synthétise les réponses pour vous fournir une réponse complète et cohérente.",
                    'rag': "Le spécialiste RAG (Retrieval-Augmented Generation) accède à la base de connaissances des documents RH de l'entreprise pour trouver des informations pertinentes concernant vos politiques internes, procédures et documents de référence.",
                    'web': "Le chercheur Web explore les sources d'information en ligne fiables pour trouver les dernières actualités, modifications législatives et meilleures pratiques en matière de ressources humaines au Maroc.",
                    'labor': "L'expert en droit du travail marocain fournit des informations précises sur la législation du travail, les obligations légales des employeurs, et les droits des employés conformément au Code du Travail marocain.",
                    'recruitment': "Le spécialiste recrutement conseille sur les meilleures pratiques d'embauche, les techniques d'entretien, les plateformes de recrutement locales, et les stratégies d'attraction des talents au Maroc.",
                    'payroll': "Le calculateur de paie effectue des simulations précises de salaires nets, calcule les cotisations sociales obligatoires (CNSS, AMO) et l'impôt sur le revenu selon les barèmes marocains en vigueur.",
                    'policy': "Le conseiller en politiques RH aide à développer et à mettre en œuvre des politiques RH efficaces, conformes à la législation marocaine et adaptées à la culture d'entreprise.",
                    'performance': "L'analyste de performance évalue les systèmes d'évaluation des employés, propose des méthodes pour mesurer la productivité et suggère des programmes de développement professionnel."
                };
                this.setupEventListeners();
                // this.initializeSystem();
            }

            generateSessionId() {
                return 'session_' + Date.now() + '_' + Math.random().toString(36).substr(2, 9);
            }

            setupEventListeners() {
                const floatBtn = document.getElementById('chatFloatBtn');
                const chatPopup = document.getElementById('chatPopup');
                const chatClose = document.getElementById('chatClose');
                const chatInput = document.getElementById('chatInput');
                const chatSendBtn = document.getElementById('chatSendBtn');

                // Toggle chat popup
                floatBtn.addEventListener('click', () => {
                    this.toggleChat();
                });

                chatClose.addEventListener('click', () => {
                    this.closeChat();
                });

                // Input events
                chatInput.addEventListener('keydown', (e) => {
                    if (e.key === 'Enter' && !e.shiftKey) {
                        e.preventDefault();
                        this.sendMessage();
                    }
                });

                chatInput.addEventListener('input', () => {
                    this.autoResize(chatInput);
                });

                chatSendBtn.addEventListener('click', () => {
                    this.sendMessage();
                });

                // Close on outside click
                document.addEventListener('click', (e) => {
                    if (!chatPopup.contains(e.target) && !floatBtn.contains(e.target) && this.isOpen) {
                        this.closeChat();
                    }
                });
            }
            
            toggleChat() {
                if (this.isOpen) {
                    this.closeChat();
                } else {
                    this.openChat();
                }
            }

            openChat() {
                const chatPopup = document.getElementById('chatPopup');
                // const floatBtn = document.getElementById('chatFloatBtn');
                
                chatPopup.classList.add('active');
                // floatBtn.classList.add('active');
                // floatBtn.innerHTML = '<i class="bi bi-times"></i>';
                
                this.isOpen = true;
                
                // Focus input
                setTimeout(() => {
                    document.getElementById('chatInput').focus();
                }, 300);
            }

            closeChat() {
                const chatPopup = document.getElementById('chatPopup');
                // const floatBtn = document.getElementById('chatFloatBtn');
                
                chatPopup.classList.remove('active');
                // floatBtn.classList.remove('active');
                // floatBtn.innerHTML = '<i class="bi bi-comments"></i>';
                
                this.isOpen = false;
            }

            autoResize(textarea) {
                textarea.style.height = 'auto';
                textarea.style.height = Math.min(textarea.scrollHeight, 100) + 'px';
            }



            parseMarkdown(text) {
                // Basic markdown parsing
                let html = text;
                
                // Headers
                html = html.replace(/### (.*?)(\n|$)/g, '<h3>$1</h3>');
                html = html.replace(/## (.*?)(\n|$)/g, '<h2>$1</h2>');
                html = html.replace(/# (.*?)(\n|$)/g, '<h1>$1</h1>');
                
                // Bold
                html = html.replace(/\*\*(.*?)\*\*/g, '<strong>$1</strong>');
                
                // Italic
                html = html.replace(/\*(.*?)\*/g, '<em>$1</em>');
                
                // Lists
                html = html.replace(/^• (.*)$/gm, '<li>$1</li>');
                html = html.replace(/(<li>.*<\/li>)/gs, '<ul>$1</ul>');
                
                // Line breaks
                html = html.replace(/\n/g, '<br>');
                
                return html;
            }

            async callHRAgentAPI(question) {
                try {
                    const response = await fetch(`${this.apiEndpoint}/ask`, {
                        method: 'POST',
                        headers: { 'Content-Type': 'application/json' },
                        body: JSON.stringify({
                            question: question,
                            session_id: this.currentSessionId,
                            context: {
                                user_location: 'Morocco',
                                language: 'fr',
                                history: this.messageHistory.slice(-5)
                            }
                        })
                    });
                    
                    if (!response.ok) throw new Error(`API error: ${response.status}`);
                    
                    const data = await response.json();
                    
                    // Properly map to frontend expectations
                    return {
                        content: data.content,
                        confidence: data.confidence,
                        sources: data.sources,
                        metadata: data.metadata,
                        processing_steps: data.processing_steps
                    };
                    
                } catch (error) {
                     console.error('API call failed:', error);
                     return {
                         content: "Erreur de connexion au système. Veuillez réessayer plus tard.",
                         confidence: 0.0,
                         sources: [],
                         metadata: { error: error.message }
                     };
                 }
            }

            async sendMessage() {
                const chatInput = document.getElementById('chatInput');
                const message = chatInput.value.trim();

                if (!message) return;

                // if (!this.isConnected) {
                //     this.addMessage(
                //         "Impossible d'envoyer le message. Système hors ligne. Veuillez réessayer plus tard.",
                //         'bot'
                //     );
                //     return;
                // }

                // Disable input during processing
                chatInput.disabled = true;
                document.getElementById('chatSendBtn').disabled = true;

                // Add user message to chat
                this.addMessage(message, 'user');
                chatInput.value = '';
                chatInput.style.height = 'auto';

                // Show typing indicator
                this.showTypingIndicator();

                 try {
                    // Call the multi-agent API
                    const response = await this.callHRAgentAPI(message);
                    this.hideTypingIndicator();
                    this.addMessage(response.content, 'bot', response.metadata);

                 } catch (error) {
                     console.error('Error:', error);
                     this.hideTypingIndicator();
                     this.addMessage(
                         "Désolé, une erreur s'est produite lors de la communication avec les agents. Veuillez réessayer.",
                         'bot'
                     );
                     this.updateConnectionStatus(false);
                     this.isConnected = false;
                 } finally {
                     // Re-enable input
                     chatInput.disabled = false;
                     document.getElementById('chatSendBtn').disabled = false;
                     chatInput.focus();
                 }
            }

            addMessage(content, sender, metadata = null) {
                const chatMessagesPopup = document.getElementById('chatMessagesPopup');
                
                const messageDiv = document.createElement('div');
                messageDiv.className = `chat-message ${sender}`;
                
                const avatar = document.createElement('div');
                avatar.className = 'chat-message-avatar';
                avatar.innerHTML = sender === 'user' ? '<i class="bi bi-person"></i>' : '<i class="bi bi-robot"></i>';
                
                const contentDiv = document.createElement('div');
                contentDiv.className = 'chat-message-content';
                contentDiv.innerHTML = this.parseMarkdown(content);
                
                messageDiv.appendChild(avatar);
                messageDiv.appendChild(contentDiv);

                // Add metadata for bot messages
                if (sender === 'bot' && metadata) {
                    const metaDiv = document.createElement('div');
                    metaDiv.className = 'response-metadata';
                    
                    const agents = metadata.involved_agents?.join(', ') || 'Assistant';
                    const confidence = Math.round((metadata.confidence || 0.8) * 100);
                    
                    metaDiv.innerHTML = `
                        <span class="metadata-chip"><i class="bi bi-robot"></i> ${agents}</span>
                        <span class="metadata-chip"><i class="bi bi-check-circle"></i> ${confidence}%</span>
                    `;
                    
                    contentDiv.appendChild(metaDiv);
                }
                
                chatMessagesPopup.appendChild(messageDiv);
                
                // Scroll to bottom
                chatMessagesPopup.scrollTop = chatMessagesPopup.scrollHeight;
            }

            parseMarkdown(text) {
                let html = text;
                
                // Bold
                html = html.replace(/\*\*(.*?)\*\*/g, '<strong>$1</strong>');
                
                // Italic
                html = html.replace(/\*(.*?)\*/g, '<em>$1</em>');
                
                // Lists
                html = html.replace(/^• (.*)$/gm, '<li>$1</li>');
                html = html.replace(/(<li>.*<\/li>)/gs, '<ul>$1</ul>');
                
                // Line breaks
                html = html.replace(/\n/g, '<br>');
                
                return html;
            }

            showTypingIndicator() {
                document.getElementById('typingIndicator').classList.add('active');
            }

            hideTypingIndicator() {
                document.getElementById('typingIndicator').classList.remove('active');
            }

            async simulateAgentResponse(question) {
                // Simulate network delay
                await new Promise(resolve => setTimeout(resolve, 1000 + Math.random() * 2000));

                const q = question.toLowerCase();
                let response = {
                    content: '',
                    metadata: {
                        involved_agents: [],
                        confidence: 0.8 + Math.random() * 0.15
                    }
                };

                if (q.includes('congé') || q.includes('vacance')) {
                    response.content = `📅 **Congés payés au Maroc:**

• **Durée minimale:** 18 jours ouvrables par an
• **Calcul:** 1,5 jour par mois de travail effectif
• **Ancienneté:** Après 6 mois de service continu
• **Période:** Généralement du 1er mai au 30 septembre

**Congés supplémentaires:**
• Congé de maternité: 14 semaines
• Congé de paternité: 3 jours`;
                    
                    response.metadata.involved_agents = ['Expert Droit', 'Spécialiste RAG'];
                    response.metadata.confidence = 0.95;
                    
                } else if (q.includes('salaire') || q.includes('paie')) {
                    response.content = `💰 **Calcul du salaire net au Maroc:**

**Cotisations salariales:**
• CNSS: 4,26% du salaire brut
• AMO: 2,25% du salaire brut

**Impôt sur le revenu (IR):**
• 0 à 30 000 DH/an: 0%
• 30 001 à 50 000 DH/an: 10%
• 50 001 à 60 000 DH/an: 20%
• Plus de 60 000 DH/an: 30%+`;
                    
                    response.metadata.involved_agents = ['Calculateur Paie', 'Expert Fiscal'];
                    response.metadata.confidence = 0.9;
                    
                } else if (q.includes('recrutement') || q.includes('embauche')) {
                    response.content = `👥 **Processus de recrutement au Maroc:**

**1. Définition du poste**
• Analyse des besoins
• Fiche de poste détaillée

**2. Sourcing**
• Emploi.ma, Rekrute.com
• LinkedIn, cooptation

**3. Sélection**
• Tri des CV
• Entretiens structurés
• Tests techniques

**4. Finalisation**
• Vérification références
• Contrat conforme au Code du travail`;
                    
                    response.metadata.involved_agents = ['Spécialiste Recrutement', 'Conseiller RH'];
                    response.metadata.confidence = 0.85;
                    
                } else {
                    response.content = `Merci pour votre question ! 

Je suis spécialisé dans les ressources humaines au Maroc. Je peux vous aider avec :

• 📅 Congés et absences
• 💰 Salaires et paie
• 👥 Recrutement
• ⚖️ Droit du travail
• 📈 Performance RH

N'hésitez pas à me poser une question plus spécifique !`;
                    
                    response.metadata.involved_agents = ['Assistant Général'];
                    response.metadata.confidence = 0.7;
                }

                return response;
            }
        }

        // Quick question function
        function askQuickQuestion(question) {
            const chatInput = document.getElementById('chatInput');
            chatInput.value = question;
            chatInput.dispatchEvent(new Event('input', { bubbles: true }));
            window.popupChat.sendMessage();
        }

        // Initialize when page loads
        document.addEventListener('DOMContentLoaded', () => {
            window.popupChat = new PopupChatWidget();
        });
    </script>
